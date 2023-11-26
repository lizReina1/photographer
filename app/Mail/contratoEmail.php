<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\organizador_fotografo;


class contratoEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $data=[];
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    public function build()
    {
        return $this
            ->subject('Mail Notify')  // Asunto del correo electrónico
            ->view('contrato')       // Vista Blade para el contenido del correo electrónico
            ->with('data', $this->data);  // Pasar datos a la vista
    }

    /**
     * Get the message envelope.
     */
    /* public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contrato Email',
        );
    } */

    /**
     * Get the message content definition.
     */
    /* public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    } */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
 /*    public function attachments(): array
    {
        return [];
    } */
    public function contratos($evento_id,$organizador_id,$fotografo_id){
        organizador_fotografo::create([
            'evento_id' => $evento_id,
            'fotografo_id' => $fotografo_id,
            'organizador_id' => $organizador_id
        ]);
    }
}
