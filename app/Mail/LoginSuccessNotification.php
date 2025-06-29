<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoginSuccessNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Login Berhasil - ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.login-success',
            with: [
                'user' => $this->user,
                'loginTime' => $this->user->last_login_at,
                'ipAddress' => request()->ip(),
                'userAgent' => request()->userAgent(),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
