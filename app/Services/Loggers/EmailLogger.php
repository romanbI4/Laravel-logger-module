<?php

namespace App\Services\Loggers;

use App\Mail\LoggerEmail;
use Illuminate\Support\Facades\Mail;

class EmailLogger
{
    public static function send(string $message): void
    {
        $fullMessage = "{$message} was sent via email";

        Mail::to(config('loggers.types.email.address_to'))->send(new LoggerEmail($fullMessage));
    }
}
