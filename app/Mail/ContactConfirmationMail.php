<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thanks for your message — I’ll get back to you soon!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-confirmation',
            with: ['data' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
