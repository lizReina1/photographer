<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $qrPath;
    
    //Array $data received from EmailController->sendEmail
    public function __construct($data)
    {
        $this->subject  = $data['subject'];
        $this->qrPath   = $data['qr'];
    }

   

    public function build()
    {
        return $this->view('correo')
            ->subject($this->subject)
            ->attach(public_path($this->qrPath), [
                'as'   => 'codigo_qr.png',
                'mime' => 'image/png',
            ]);
    }
    

    

    
    /**
     * Get the message envelope.
     */
   /*   public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mail Notify',
        );
    } 
 */
    /**
     * Get the message content definition.
     */
    /* public function content(): Content
    {
        return new Content(
            view: 'correo',
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
} 
