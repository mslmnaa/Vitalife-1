<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
        from: new \Illuminate\Mail\Mailables\Address('noreply@vitalife.my.id', 'Vitalife Team'),
            subject: 'Welcome to Vitalife!',
            headers: [
            'List-Unsubscribe' => '<mailto:unsubscribe@vitalife.my.id>, <https://vitalife.my.id/unsubscribe>',
        ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
