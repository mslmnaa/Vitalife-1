<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginSuccessNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public User $user;
    public $loginTime;
    public $ipAddress;
    public $userAgent;

    public function __construct(User $user, $loginTime = null, $ipAddress = null, $userAgent = null)
    {
        $this->user = $user;
        $this->loginTime = $loginTime ?? $user->last_login_at ?? now();
        $this->ipAddress = $ipAddress ?? 'Unknown';
        $this->userAgent = $userAgent ?? 'Unknown';
    }

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
                'loginTime' => $this->loginTime,
                'ipAddress' => $this->ipAddress,
                'userAgent' => $this->userAgent,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}