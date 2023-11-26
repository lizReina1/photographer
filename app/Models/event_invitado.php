<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_invitado extends Model
{
    use HasFactory;
    protected $table = 'event_invitados';

    protected $fillable = [
        'evento_id', 'invitados_id', // Cambié 'evento_id' e 'invitados_id' a 'evento_id' y 'invitado_id' respectivamente.
    ];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'event_invitados', 'evento_id', 'invitados_id');
    }

    public function invitados()
    {
        return $this->belongsToMany(Invitados::class, 'event_invitados', 'invitados_id', 'evento_id');
    }
}
