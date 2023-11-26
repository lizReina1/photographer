<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Cliente;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Actions\Fortify\ValidationException;
use App\Models\Fotografo;
use App\Models\Organizador;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'tipo' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'integer'],
            'nombreEmpresa' => ['nullable', 'string', 'max:255'],
            'especialidad' =>  ['nullable', 'string', 'max:255'],
        ]);
        $validator->validate();
    
            $tipo = strtoupper($input['tipo']);
        
            if (in_array($tipo, ['C', 'O', 'P'])) {

                if ($tipo == 'C' && (empty($input['telefono']) )) {
                    throw new \Exception('Debe llenar todos los campos primero.');
                } elseif ($tipo == 'O' && (empty($input['nombreEmpresa']))) {
                    throw new \Exception('Debe llenar todos los campos primero.');
                } elseif ($tipo == 'P' && (empty($input['especialidad']))) {
                    
                    throw new \Exception('Debe llenar todos los campos primero.',$input['especialidad']);
                }

                $user = User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'tipo' => $tipo, 
                ]);

                $userId = $user->id;

                if ($tipo == 'C') {
                    $rol = 'cliente';
                    $cliente = cliente::create([
                        'nombre' => $input['name'],
                        'telefono' => $input['telefono']?? null,
                        'user_id' => $userId
                    ]);
                } elseif ($tipo == 'O') {
                    $rol = 'organizador';
                    $organizador = Organizador::create([
                        'nombre' => $input['name'],
                        'nombreEmpresa' => $input['nombreEmpresa']?? null,
                        'user_id' => $userId
                    ]);
                } elseif ($tipo == 'P') {
                    $rol = 'fotografo';
                    $fotografo = Fotografo::create([
                        'nombre' => $input['name'],
                        'disponibilidad' => $input['disponibilidad']?? null,
                        'especialidad' => $input['especialidad']?? null,
                        'user_id' => $userId
                    ]);
                }                
                
                $user->assignRole($rol);
                return $user;
            }
        
            }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
