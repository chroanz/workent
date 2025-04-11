<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserAccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(string $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Seu acesso como convidado',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.user_access', // to do: mudar para a view correta depois
            with: [
                'user' => $this->user,
            ],
        );
    }
}
