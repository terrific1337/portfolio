<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class MessageReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageModel;
    public $replyText;

    public function __construct(Message $messageModel, $replyText)
    {
        $this->messageModel = $messageModel;
        $this->replyText = $replyText;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Re: ' . $this->messageModel->subject
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.message-reply',
            with: [
                'messageModel' => $this->messageModel,
                'replyText' => $this->replyText
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
