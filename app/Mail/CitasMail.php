<?php

namespace App\Mail;

use App\Models\Cita;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CitasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cita;
    /**
     * Create a new message instance.
     */
    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Detalles de su cita médica',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.citas.cita-detalle',  // Asegúrate de que la vista exista en resources/views/emails/citas/cita-detalle.blade.php
            with: [
                'cita' => $this->cita,  // Pasa los detalles de la cita a la vista
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
