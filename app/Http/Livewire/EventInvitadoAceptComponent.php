<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evento;
use App\Models\Invitados;

class EventInvitadoAceptComponent extends Component
{
    public $mensaje = "Hola, este es un componente Livewire.";
    public $nombreInvitado;

    public function render()
    {
        return view('livewire.event-invitado-acept');
    }

    public function mount($correo, $idEvento)
    {
      
        $evento = Evento::findOrFail($idEvento);

        $invitado = Invitados::where('correo_invitado', $correo)->first();

        // Si se encuentra el invitado, actualiza su estado de asistencia
        if ($invitado) {
            $invitado->update(['estado_asistencia' => true]);
            $this->nombreInvitado = $correo; // Actualiza la propiedad para mostrarla en la vista
            return "Asistencia marcada como 'true' para el invitado con correo: $correo en el evento con ID: $idEvento";
        } else {
            return "Invitado con correo: $correo no encontrado en el evento con ID: $idEvento";
        }
    }
}
