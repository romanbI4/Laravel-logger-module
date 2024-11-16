<?php

namespace App\Services\Loggers;

use Illuminate\Support\Facades\Storage;

class FileLogger
{
    public static function send(string $message): void
    {
        $fullMessage = "{$message} was sent via file";

        Storage::append(config('loggers.types.file.path'), $fullMessage);
    }
}
