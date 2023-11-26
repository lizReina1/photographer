<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'tema', 'lugar', 'fecha', 'hora', 'catalogo','organizador_id'
    ];

    public function organizadors()
    {
        return $this->belongsTo(Organizador::class, 'organizador_id');
    }

    public function codigoqrs()
    {
        return $this->hasMany(Codigoqr::class, 'id');
    }

    public function invitados()
{
    return $this->belongsToMany(Invitados::class, 'event_invitados', 'evento_id', 'invitados_id');
}

public function organizador_fotografos()
{
    return $this->belongsTo(organizador_fotografo::class, 'id');
}


}
