<?php

namespace App\Mail;

use App\Models\Ordinateur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateOrdinateurMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ordinateur;

    /**
     * Create a new message instance.
     */
    public function __construct(Ordinateur $ordinateur) { $this->ordinateur = $ordinateur;}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Création d'un Ordinateur",
        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.createOrdinateur',
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
