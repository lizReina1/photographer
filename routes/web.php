<?php

use App\Http\Livewire\EventComponent;
use App\Http\Livewire\EventInvitadoAceptComponent;
use App\Http\Livewire\EventoComponent;
use App\Http\Livewire\ListaInvitadosComponent;
use App\Http\Livewire\ShowEvent;
use App\Http\Livewire\ShowEventos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
   

    
});

    Route::get('evento', EventoComponent::class)->name('evento.render');
    Route::get('event', EventComponent::class)->name('event.render');
    Route::get('show-evento/{evento_id}', ShowEvent::class)->name('show-event.render');

    Route::get('tienda', EventoComponent::class)->name('tienda.render');
    Route::get('catalogo', EventoComponent::class)->name('catalogo-fotograafo.render');
    Route::get('generarqr/{id}', [EventComponent::class, 'generar'])->name('event.generar');

    Route::get('/aceptar-invitacion/{correo}/{idEvento}',EventInvitadoAceptComponent::class)
    ->name('event-invitado-acept.render');

    Route::get('listaInvitados/{idEvento}',ListaInvitadosComponent::class)->name('lista-invitados-component.render');

 /*    Route::get('/generarqr/{id}', function () {
        return view('livewire.generar-qr');
    });s
 */