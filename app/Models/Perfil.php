<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfils';

    protected $fillable = [
        'nombres','apellidos', 'celular', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public  function fotos(){
        return $this->hasMany(Foto::class, 'id');

    }

}
