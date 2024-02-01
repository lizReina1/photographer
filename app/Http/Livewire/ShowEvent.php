<?php

namespace App\Http\Livewire;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Invitados;
use App\Models\event_invitado;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

use App\Models\Fotografo;
use App\Models\organizador_fotografo;
use Livewire\Component;

class ShowEvent extends Component
{
    public $evento_id;
    public $evento;
    public $invitados;

    public $showAlert = false;
    public $state = true;
    public $nombre;
    public $correoInvitado;
    public $estadoAsistencia = false;
    public $getInvitados;
    public $inv_id;

    /* ---------fotografo----------- */
    public $fotografoAll;


    protected $listeners = ['imageDownloaded'];

    public $dataURL;
    public $fileName;

    protected $rules = [
        'nombre' => 'required',
        'correoInvitado' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.show-event');
    }

    public function mount($evento_id)
    {
        $this->evento_id = $evento_id;
        $this->evento = Evento::where('id', $this->evento_id)->first();

        $invitados = Evento::find($this->evento_id);
        $this->getInvitados = $invitados->invitados;

        /*  $fotografos = Fotografo::find($this->evento_id);
        $this->fotografoAll = $fotografos->fotografos; */
    }

    public function cargarInvitados()
    {
        $invitados = Evento::find($this->evento_id);
        $this->getInvitados = $invitados->invitados;
    }

    public function submit()
    {

        $this->validate();

        // Execution doesn't reach here if validation fails.

        $invitado = Invitados::create([
            'nombre' => $this->nombre,
            'correo_invitado' => $this->correoInvitado,
            'estado_asistencia' => $this->estadoAsistencia
        ]);

        $invitadoId = $invitado->id;
        event_invitado::create([
            'evento_id' => $this->evento_id,
            'invitados_id' => $invitadoId,
        ]);

        $this->clear();
        $this->cargarInvitados();
    }

    public function clear()
    {
        $this->reset(['nombre', 'correoInvitado', 'estadoAsistencia']);
        $this->state = true;
    }

    public function delete($id)
    {
        $inv = Invitados::find($id);
        if ($inv) {

            $inv->delete();
            $eve_inv = event_invitado::where('invitados_id', $inv->id)->get();

            foreach ($eve_inv as $eventoInvitado) {
                $eventoInvitado->delete();
            }
        }
        $this->clear();
        $this->cargarInvitados();
    }

    public function edit($id)
    {
        $this->state = false;
        $inv = Invitados::find($id);

        $this->clear();

        if ($inv) {
            $this->state = false;
            $this->inv_id = $inv->id;
            $this->nombre = $inv->nombre;
            $this->correoInvitado = $inv->correo_invitado;
        }
    }

    public function update($id)
    {

        $inv = Invitados::find($id);

        if ($inv) {
            $inv->nombre = $this->nombre;
            $inv->correo_invitado = $this->correoInvitado;
            $inv->save();
        }
        $this->clear();
        $this->cargarInvitados();

        $this->state = true;
    }


    public function downloadImage()
    {
        // Generar el código QR
        $qrCode = QrCode::size(150)->generate(route('event.generar', $this->evento_id));
        $this->dataURL = 'data:image/png;base64,' . base64_encode($qrCode);
        $this->fileName = 'qrcode.png';

        // Guardar la imagen en el servidor
        $imagenBinaria = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $this->dataURL));
        $filePath = 'public/images/' . $this->fileName;
        Storage::put($filePath, $imagenBinaria);

        // Emitir un evento para notificar que la imagen ha sido descargada
        $this->emit('imageDownloaded', $filePath);
    }


    public function enviarEmail($invitado,$mensaje)
    { 
        // Genera el código QR
        $qr = QrCode::format('png')->size(200)->generate(route('event.generar', $mensaje));
    
        // Genera un nombre único para el archivo basado en la marca de tiempo
        $qrFileName = 'qrcode_evento_' . time() . '.png';
    
        // Almacena el código QR en el sistema de archivos
        $qrPath = 'images/' . $qrFileName;
        file_put_contents(public_path($qrPath), $qr);
    
        $data = [
            'subject'   => 'invitacion',
            'email'     => $invitado,
            'qr'        => $qrPath, 
            'invitacion' => Evento::find($mensaje),
        ];
    
        $email = new MailNotify($data);
    
        // Configura el remitente utilizando el método from en la instancia de Mailable
        $email->from('lizreina.rq@gmail.com', 'Nombre del Remitente');
    
       
        // Envia el correo electrónico
        Mail::to($invitado)->send($email);
    
        return response()->json(['message' => 'Correo electrónico enviado con éxito']);
    }
    

    public function contratos($fotografo_id, $organizador_id)
    {
        organizador_fotografo::create([
            'evento_id' => $this->evento_id,
            'fotografo_id' => $fotografo_id,
            'organizador_id' => $organizador_id
        ]);
    }
}
