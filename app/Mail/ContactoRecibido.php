<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public Contact $contacto;

    public function __construct(Contact $contacto)
    {
        $this->contacto = $contacto;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo contacto desde Aqua-Anita: ' . $this->contacto->nombre,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contacto',
        );
    }
}
