<div>
    <div class="row">
        <div class="col text-center ">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container mt-10">
                    <div class="row mb-4">

                        <div class="col-md-6 offset-md-3 text-center">
                            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="#">
                                Evento
                            </a>
                        </div>

                        <div class="col-md-3 text-end">

                            <button type="button" data-bs-toggle="modal" data-bs-target="#formaModal" wire:click="clear()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                                </svg>
                            </button>

                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex">

                        @foreach ($eventos as $eventos)
                        <div class="col d-flex">
                            <div class="event-wrapper mb-45 text-center">
                                <div class="card card-blog  ">

                                    <div class="card-image ">
                                        <div class="event-action ">
                                            <div class="event-action-style"> <a href="{{ route('show-event.render',['evento_id' => $eventos->id]) }}"> <i class="bi bi-eye"></i></a> </div>

                                            <div class="event-action-style" wire:click="edit({{ $eventos->id }})" data-bs-toggle="modal" data-bs-target="#formaModal"> <a href="#"> <i class="bi bi-pencil"></i> </a> </div>
                                            <div class="event-action-style" wire:click="delete({{ $eventos->id }})"> <a href="#"><i class="bi bi-trash-fill"></i> </a> </div>

                                        </div>
                                        <a href="#"> <img class="img" src="http://adamthemes.com/demo/code/cards/images/blog01.jpeg"> </a>
                                        <div class="ripple-cont"></div>
                                    </div>
                                    <div class="table">
                                        <h6 class="category text-warning">
                                            <i class="fa fa-soundcloud"></i> Evento {{$eventos->tema}}

                                        </h6>
                                        <h5 class="card-caption">
                                            {{$eventos->lugar}}
                                        </h5>
                                        <div class="ftr">
                                            <div class="stats"> <i class="fa fa-date-o"></i> {{$eventos->fecha }} </div>

                                            <div class="stats"> <i class="fa fa-clock-o"></i> {{$eventos->hora }} </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-4 col-12 text-center">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">

                <div class="container mt-10">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    Fotografos
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($fotografos as $fotografos)
                                    <li class="list-group-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="images/diseno-web-fotografos.jpg" class="me-3" alt="Warren Briggs" style="max-width: 50px; border-radius: 50%;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="my-0">{{$fotografos->nombre}}</h6>

                                                        <button type="button" class="btn btn-info" wire:click="enviarContrato({{ $fotografos->id}},{{auth()->user()->id }})">contratar</button>
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header  d-flex justify-content-between align-items-center">
                                    <span>Personas</span>
                                    <button class="btn btn-info" style="border-radius: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg></button>
                                </div>

                                <ul class="list-group list-group-flush">
                                    @foreach ($personas as $personas)
                                    <li class="list-group-item">
                                        <div class="card">
                                            <div class="card-body ">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://media.istockphoto.com/photos/beautiful-woman-wearing-brown-curly-hairstyle-picture-id495006065?s=170x170" class="me-3" alt="Warren Briggs" style="max-width: 50px; border-radius: 50%;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="my-0">{{$personas->nombre}}</h6>
                                                        <p class="small m-0">
                                                            <i class="fas fa-circle text-success me-1"></i>
                                                            Online
                                                        </p>
                                                    </div>
                                                    <div>

                                                        <button type="button" class="btn btn-info"> <i class="bi bi-person-plus-fill"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('components.modalheader')
    @if ($showAlert)
    <div class="alert alert-danger" role="alert">
        Por favor, completa todos los campos.
    </div>
    @endif

    <div class="mb-3">
        <label for="tema" class="form-label"> Nombre Evento: </label>
        <input type="text" class="form-control" id="tema" wire:model='tema' placeholder="" required="">

    </div>

    <div class="mb-3">
        <label for="lugar" class="form-label">Lugar Evento: </label>
        <input type="text" class="form-control" id="lugar" wire:model='lugar' placeholder="">
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha: </label>
        <input type="date" class="form-control" id="fecha" wire:model='fecha' placeholder="">
    </div>
    <div class="mb-3">
        <label for="hora" class="form-label">Hora Evento:</label>
        <input type="time" class="form-control" wire:model='hora' id="hora">
    </div>
    <div class="mb-3">
        <label for="catalogo" class="form-label">Catalogo:</label>
        <select id="catalogo" class="form-control" wire:model='catalogo'>
            <option value="">Seleccionar</option>
            <option value='publico'>publico</option>
            <option value='privado'>privado</option>
            <option value='compartido'>compartido</option>
        </select>
    </div>
    @include('components.modalfooter')
</div>