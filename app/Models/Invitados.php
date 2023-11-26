<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitados extends Model
{
    use HasFactory;

    protected $table = 'invitados';

    protected $fillable = [
        'nombre','correo_invitado','estado_asistencia',
    ];

    public function eventos()
{
    return $this->belongsToMany(Evento::class, 'event_invitados', 'invitado_id', 'evento_id');
}
}
