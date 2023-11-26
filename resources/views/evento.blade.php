<div>
    <div class="row">
        <div class="col text-center ">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container mt-10">
                    <div class="row mb-4">

                        <div class="col text-center">
                            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl" href="#">
                                Evento
                            </a>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4 d-flex">
                        <div class="col text-center" style="margin-top: 45px; ">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#formaModal" wire:click="clear()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col d-flex">
                            <div class="event-wrapper mb-45 text-center">

                                <div class="card text-white text-center p-3" style="width: 18rem; background-color: #ffffe7;">
                                    <div class="event-action">
                                        <div class="event-action-style"> <a href="#"> <i class="bi bi-eye"></i> </a> </div>
                                        <div class="event-action-style"> <a href="#"> <i class="bi bi-pencil"></i> </a> </div>
                                        <div class="event-action-style"> <a href="#"> <i class="bi bi-trash-fill"></i> </a> </div>

                                    </div>
                                    <blockquote class="blockquote mb-0" style="color: black;">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                                        <footer class="blockquote-footer">
                                            <small>
                                                Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>

                                </div>
                            </div>
                        </div>

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
                                                    <img src="https://media.istockphoto.com/photos/beautiful-woman-wearing-brown-curly-hairstyle-picture-id495006065?s=170x170" class="me-3" alt="Warren Briggs" style="max-width: 50px; border-radius: 50%;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="my-0">{{$fotografos->nombre}}</h6>
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
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    Personas
                                    <button class="btn btn-primary">+</button>

                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="card">
                                            <div class="card-body event-wrapper">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://media.istockphoto.com/photos/beautiful-woman-wearing-brown-curly-hairstyle-picture-id495006065?s=170x170" class="me-3" alt="Warren Briggs" style="max-width: 50px; border-radius: 50%;">
                                                    <div class="flex-grow-1">
                                                        <h6 class="my-0">Warren Briggs</h6>
                                                        <p class="small m-0">
                                                            <i class="fas fa-circle text-success me-1"></i>
                                                            Online
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <div class="event-action">
                                                            <button type="button" class="event-action-style"> <i class="bi bi-eye"></i></button>
                                                            <button type="button" class="event-action-style"><i class="bi bi-pencil"></i></button>
                                                            <button type="button" class="event-action-style"><i class="bi bi-trash-fill"></i></button>

                                                        </div>
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
        <input type="text" class="form-control" id="tema" wire:model='tema' placeholder="los aventurados.." required="">

    </div>

    <div class="mb-3">
        <label for="lugar" class="form-label">Lugar Evento: </label>
        <input type="text" class="form-control" id="lugar" wire:model='lugar' placeholder="calle junin..">
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