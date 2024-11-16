<?php

namespace App\Services\Loggers;

use App\Models\Logger;

class DatabaseLogger
{
    public static function send(string $message): void
    {
        $fullMessage = "{$message} was sent via db";

        $logger = new Logger();
        $logger->message = $fullMessage;
        $logger->save();
    }
}
