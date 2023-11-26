<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\View;

use App\Models\Cliente;
use App\Models\Codigoqr;
use App\Models\Evento;
use App\Models\Fotografo;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\contratoEmail;
use App\Models\Organizador;
use App\Models\User;
use Livewire\Component;

class EventComponent extends Component
{
    public $tema;
    public $fecha;
    public $hora;
    public $lugar;
    public $catalogo;
    public $codigiqr;
    public $profilePhoto;
    public $organizador_id;
    public $showAlert = false;
    public $state = true;
    public $photografo_id;
    public $titulo;
    public $eventos;
    public $org_id;
    public $personas;
    public $generar;
    public $urlPagina;
    //fotgrafo
    public $fotografos;

    public function render()
    {
        $this->fotografos = Fotografo::get();
        $this->personas = Cliente::get();

        $this->eventos = Evento::get();
        return view('livewire.event-component');
    }

    public function store()
    {
        /*        dd($this->tema,$this->fecha,$this->hora,$this->lugar,$this->catalogo);
 */
        if (
            empty($this->tema) ||
            empty($this->fecha) ||
            empty($this->hora) ||
            empty($this->lugar) ||
            empty($this->catalogo)
        ) {
            $this->showAlert = true;
            return;
        }

        $this->setState(true);
         Evento::create([
            'tema' => $this->tema,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'lugar' => $this->lugar,
            'catalogo' => $this->catalogo,
            'organizador_id' => auth()->user()->id,
        ]);
       

        $this->clear();
    }

    public function clear()
    {
        $this->showAlert = false;
        $this->tema = "";
        $this->fecha = "";
        $this->hora = "";
        $this->lugar = "";
        $this->catalogo = "";

        $this->setState(true);
    }

    public function edit($id)
    {
        $this->setState(false);
        $event = Evento::find($id);

        $this->clear();
        if ($event) {
            $this->setState(false);
            $this->org_id = $event->id;

            $this->tema = $event->tema;
            $this->lugar = $event->lugar;
            $this->fecha = $event->fecha;
            $this->hora = $event->hora;
            $this->catalogo = $event->catalogo;
        }
    }

    public function update($id)
    {
        if (
            empty($this->tema) ||
            empty($this->fecha) ||
            empty($this->hora) ||
            empty($this->lugar) ||
            empty($this->catalogo)
        ) {
            $this->showAlert = true;
            return;
        }
        $event = Evento::find($id);

        if ($event) {
            $event->tema = $this->tema;
            $event->lugar = $this->lugar;
            $event->fecha = $this->fecha;
            $event->hora = $this->hora;
            $event->catalogo = $this->catalogo;
            $event->organizador_id = auth()->user()->id;
            $event->save();

            $this->setState(true);
        }
    }

    public function delete($id)
    {
        $event = Evento::find($id);

        if ($event) {
            $event->delete();
        }
        $this->clear();
    }

    private function setState($state)
    {
        if ($state == true) {
            $this->titulo = 'Crear';
        } else {
            $this->titulo = 'Editar';
        }
        $this->state = $state;
    }

    public function generar($id)
    {
        $event = Evento::find($id);

        return view('livewire.generar-qr', compact('event'));
    }

    public function sumar()
    {
        $this->emit('logro10');
    }

    public function enviarContrato($id,$organizador_id)
    {   
         $user_id = Organizador::where('user_id',$organizador_id)->first();

         $ft = Fotografo::where('id', $id)->first();
         $correoDestino = User::where('id',$ft->user_id)->first();

        $data = [
            'name' => 'Nombre del destinatario',
            'email' => $correoDestino->email,
            'fotografo_id' => $id,
            'organizador_id' => $user_id->id,
        ];
   
        $email = new contratoEmail($data);
        $email->from('lizreina.rq@gmail.com', 'Nombre del Remitente');
        Mail::to('lizreina.rq@gmail.com')->send($email);
        return response()->json(['message' => 'Correo electrónico enviado con éxito']); 
    }
}
