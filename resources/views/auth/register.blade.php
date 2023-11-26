<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhotoGraphers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="img/panda.jpg" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </link>
    <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    </link>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/app.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />


    @livewireStyles

</head>

<body class="hompage bg-accent-light">
    @include('layouts.navbar-section')

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Sign In</label>
            <div class="login-form">
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <x-validation-errors class="mb-4" />

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="group">
                        <label for="name" class="label">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="input">
                    </div>

                    <div class="group">
                        <label for="email" class="label">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="input">
                    </div>
                    <div class='row'>
                        <div class="col">
                            <div class="group">
                                <label for="password" class="label">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password" required autocomplete="new-password" class="input">
                            </div>
                        </div>
                        <div class="col">
                            <div class="group">
                                <label for="password_confirmation" class="label">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="input">
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <x-label for="tipo" value="{{ __('Select Role') }}" />
                        <select id="tipo" name="tipo" class="btn btn-secondary dropdown-toggle" required onchange="toggleFields()">
                            <option value="C" {{ old('tipo') == 'C' ? 'selected' : '' }}>Cliente</option>
                            <option value="O" {{ old('tipo') == 'O' ? 'selected' : '' }}>Organizador</option>
                            <option value="P" {{ old('tipo') == 'P' ? 'selected' : '' }}>Fotógrafo</option>
                        </select>
                        <div class="group" id="inputContainer">

                        </div>

                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <div class="group">
                            <input type="submit" class="button" value="{{ __('Register') }}">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>

    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!--     <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
 -->    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        /*   document.addEventListener('DOMContentLoaded', function() {
            // Llama a toggleFields() al cargar la página para configurar la visibilidad inicial
            toggleFields();
        });
 */
        document.addEventListener('DOMContentLoaded', function() {
            // Tu código aquí
            toggleFields();
            document.getElementById('tipo').addEventListener('change', toggleFields);
        });

        function toggleFields() {
            var tipoSelect = document.getElementById('tipo');
            var container = document.getElementById('inputContainer'); // Asegúrate de tener un contenedor para los inputs

            // Elimina los inputs existentes en el contenedor
            while (container.firstChild) {
                container.removeChild(container.firstChild);
            }

            // Crea y agrega el nuevo input según la opción seleccionada
            switch (tipoSelect.value) {
                case 'O':
                    var nombreEmpresaInput = createTextInput('nombreEmpresa', 'Nombre de la Empresa');
                    container.appendChild(nombreEmpresaInput);
                    break;
                case 'P':
                    var especialidadInput = createTextInput('especialidad', 'Especialidad');
                    container.appendChild(especialidadInput);
                    break;
                case 'C':
                    var telefonoInput = createTextInput('telefono', 'Teléfono');
                    container.appendChild(telefonoInput);
                    break;
            }
        }

        function createDropdownInput(name, label) {
            var labelElement = document.createElement('label');
            labelElement.innerText = label;

            var selectElement = document.createElement('select');
            selectElement.classList.add('btn', 'btn-secondary', 'dropdown-toggle');
            selectElement.name = name;

            // Opción para true
            var optionTrue = document.createElement('option');
            optionTrue.value = 'true';
            optionTrue.text = 'Disponible';
            optionTrue.selected = true; // Añade esta línea para seleccionar por defecto
            selectElement.required = true;
            selectElement.appendChild(optionTrue);

            // Opción para false
            var optionFalse = document.createElement('option');
            optionFalse.value = 'false';
            optionFalse.text = 'No disponible';
            selectElement.required = true;

            selectElement.appendChild(optionFalse);

            labelElement.appendChild(selectElement);

            return labelElement;
        }

        function createTextInput(name, label) {
            var wrapper = document.createElement('div');
            wrapper.classList.add('group'); // Agregar la clase 'mt-4'

            var labelElement = document.createElement('label');
            labelElement.setAttribute('for', name);
            labelElement.classList.add('block', 'label'); // Agregar clases de estilo, por ejemplo, 'block' y 'mb-1'
            labelElement.textContent = label;

            var inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.name = name;
            inputElement.classList.add('block', 'input'); // Agregar clases de estilo, por ejemplo, 'block', 'mt-1' y 'w-full'
            inputElement.required = true;

            wrapper.appendChild(labelElement);
            wrapper.appendChild(inputElement);

            return wrapper;
        }
    </script>

</body>

</html>