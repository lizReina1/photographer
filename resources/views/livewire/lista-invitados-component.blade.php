<div>
<x-slot name="header">
        @livewire('navigation-menu')

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">

                    <span>Invitados</span>
                </div>
                <ol class="list-group list-group-numbered">
                    @foreach ($invitados as $invitados)

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{$invitados->nombre}}</div>
                            {{$invitados->correo_invitado}}
                        </div>
                        <button type="button" class="btn btn-dark" wire:click="delete({{ $invitados->id }})"><i class="bi bi-trash-fill"></i></button>
                    </li>
                    @endforeach


                </ol>
                
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Fotografos

                </div>
                <ol class="list-group list-group-numbered">
 
                   Ninguno
 

                </ol>
            </div>
        </div>

    </div>
    </div>

</div>
</div>