<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoggerEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $message;

    /**
     * Create a new message instance.
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return LoggerEmail
     */
    public function build(): LoggerEmail
    {
        return $this->view('emails.logger', [
            'emailLog' => $this->message
        ])->subject('Logger Template');
    }
}
