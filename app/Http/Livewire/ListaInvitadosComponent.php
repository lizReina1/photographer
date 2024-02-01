<?php

namespace App\Http\Livewire;

use App\Models\event_invitado;
use Livewire\Component;
use App\Models\Invitados;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;

class ListaInvitadosComponent extends Component
{
    public $invitados;

    public function render()
    {  
        return view('livewire.lista-invitados-component');
    }

    public function mount($idEvento){
        $evento = event_invitado::findOrFail($idEvento);

        // Recupera los invitados relacionados con el evento que tienen estado de asistencia aceptado
        $this->invitados = Invitados::join('event_invitados', 'invitados.id', '=', 'event_invitados.invitados_id')
        ->where('event_invitados.evento_id', $evento->id)
        ->where('invitados.estado_asistencia', true)
        ->get();
    
        return $this->invitados;
    }
 
}
