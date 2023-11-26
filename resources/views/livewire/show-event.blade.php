<div>
    <x-slot name="header">
        @livewire('navigation-menu')

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col text-center ">

                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$evento->tema}}</h5>
                            <p class="card-text">{{$evento->lugar}}</p>
                            <p class="card-text"><small class="text-muted">
                                    <div class="stats"> <i class="fa fa-date-o"></i> {{$evento->fecha }} </div>

                                    <div class="stats"> <i class="fa fa-clock-o"></i> {{$evento->hora }} </div>

                                </small></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="card">
                                <div class="card-header  d-flex justify-content-between align-items-center">

                                    <span>Invitados</span>
                                    <button type="button" class="btn btn-dark" wire:click="enviarEmail({{$evento_id}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg> enviar</button>
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                                        add invitado
                                    </button>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($getInvitados as $getInvitados)
                                    <li class="list-group-item">

                                        <div class="card">
                                            <div class="card-body event-wrapper">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://media.istockphoto.com/photos/beautiful-woman-wearing-brown-curly-hairstyle-picture-id495006065?s=170x170" class="me-3" alt="Warren Briggs" style="max-width: 50px; border-radius: 50%;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="my-0">{{$getInvitados->nombre}}</h6>
                                                        <h6 class="my-0">{{$getInvitados->correo_invitado}}</h6>

                                                        <p class="small m-0">
                                                            @if ($getInvitados->estado_asistencia == 'true')
                                                            Aceptado
                                                            @else
                                                            Pendiente
                                                            @endif
                                                        </p>
                                                        <button type="button" class="btn btn-dark" wire:click="delete({{ $getInvitados->id }})"><i class="bi bi-trash-fill"></i></button>
                                                    <button type="button" class="btn btn-dark" wire:click="edit({{ $getInvitados->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil"></i></button>
                                                    <button type="button" class="btn btn-dark" wire:click="enviarEmail({{$evento_id}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg> </button>
                                                    </div>
                                                   

                                                    <div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    Fotografos

                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">

                                        <div class="card">
                                            <div class="card-body event-wrapper">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://media.istockphoto.com/photos/beautiful-woman-wearing-brown-curly-hairstyle-picture-id495006065?s=170x170" class="me-3" alt="Warren Briggs" style="max-width: 50px; border-radius: 50%;">
                                                    <div class="flex-grow-1">

                                                       
                                                    <button type="button" class="btn btn-dark" wire:click="enviarEmail({{$evento_id}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg> </button>
                                                    </div>

                                                    <div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col col-md-3 col-lg-3 text-center">

                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">

                        <div class="container mt-3">
                            <div class="row">
                                <div class="col">
                                    <div class="card text-center" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Codigo QR Invitacion </h5>


                                            <div id="qrcode-container">
                                                <p class="card-text">{{ QrCode::size(150)->generate(route('event.generar', $evento_id)) }}</p>
                                            </div>
                                            <button id="download-btn">Descargar QR</button>
                                            <a href="#" class="btn btn-info">
                                                compartir
                                            </a>
                                            
                                            @if (session()->has('message'))
                                            <div>{{ session('message') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if($state)
                        Añadir invitado
                        @else
                        Editar invitado
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label> Nombre Invitado</label>
                            <input type="text" wire:model="nombre" class="form-control">
                            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label> Email Invitado</label>
                            <input type="text" wire:model="correoInvitado" class="form-control">
                            @error('correoInvitado') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if ($state)
                        <button type="button" class="btn btn-warning" wire:click='submit()' data-bs-dismiss="modal">Guardar</button>
                        @else
                        <button type="button" class="btn btn-warning" wire:click="update({{$inv_id}})" data-bs-dismiss="modal">Guardar Editado</button>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('imageDownloaded', () => {
            // Puedes agregar lógica aquí para actualizar la interfaz de usuario si es necesario
        });
    });
</script>

    <script>
        // Función para convertir el contenido del contenedor a una imagen
    </script>

</div>