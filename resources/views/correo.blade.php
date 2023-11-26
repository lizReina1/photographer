<ul>
    <li>Nombre: {{ $data['name'] }}</li>
    <li>Correo Electrónico: {{ $data['email'] }}</li>
    <li>
        <p class="card-text"> asdada </p>
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate(route('event.generar', $data['qr']))) }}" alt="Código QR">
    </li>
</ul>
