<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invitados;


class EventInvitadoAceptComponent extends Component
{
    public $nombreInvitado;

    public function render()
    {   
        return view('livewire.event-invitado-acept');
    }

    public function aceptarInvitacion($correo){
        $inv = Invitados::all();
        $this->nombreInvitado = $correo;
        return view('livewire.event-invitado-acept',['nombreInvitado' => $correo]);

    }  
 
}
