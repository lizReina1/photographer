<ul>
    <li>Nombre: {{ $data['name'] }}</li>
    <li>Correo Electrónico: {{ $data['email'] }}</li>
    <li>
        <button wire:click="enviarEmail(null,{{ $data['fotografo_id'] }},{{ $data['organizador_id'] }})" > aceptar </button>
    </li>
</ul>
