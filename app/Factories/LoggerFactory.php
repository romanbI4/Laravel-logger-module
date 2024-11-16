<?php

namespace App\Factories;

use App\Interfaces\LoggerInterface;
use App\Services\Loggers\DatabaseLogger;
use App\Services\Loggers\EmailLogger;
use App\Services\Loggers\FileLogger;

class LoggerFactory implements LoggerInterface
{
    public string $type;

    public function __construct()
    {
        $this->setType(config('loggers.default'));
    }

    /**
     * @inheritDoc
     */
    public function send(string $message): void
    {
        $this->sendByLogger($message, $this->getType());
    }

    /**
     * @inheritDoc
     */
    public function sendByLogger(string $message, string $loggerType): void
    {
        match ($loggerType) {
            'file' => FileLogger::send($message),
            'database' => DatabaseLogger::send($message),
            'email' => EmailLogger::send($message),
            default => throw new \InvalidArgumentException("Unknown logger type: {$loggerType}"),
        };
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
