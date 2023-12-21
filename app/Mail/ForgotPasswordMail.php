<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = Str::random(60);
        $resetLink = route('password.reset', ['token' => $token]);

        return $this->from('zakariaeelkhatyb@gmail.com')
            ->view('emails.forgot-password') // Update this path if needed
            ->with([
                'resetLink' => $resetLink,
            ]);
    }
}
