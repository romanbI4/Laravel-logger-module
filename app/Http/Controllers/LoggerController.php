<?php

namespace App\Http\Controllers;

use App\Interfaces\LoggerInterface;

class LoggerController extends Controller
{
    protected LoggerInterface $loggerFactory;

    public function __construct(LoggerInterface $loggerFactory)
    {
        $this->loggerFactory = $loggerFactory;
    }

    /**
     *	Sends a log message to the default logger.
     */
    public function log()
    {
        $this->loggerFactory->send(uuid_create());
    }

    /**
     *	Sends a log message to a special logger.
     *
     *	@param string $type
     */
    public function logTo(string $type)
    {
        $this->loggerFactory->sendByLogger(uuid_create(), $type);
    }

    /**
     *	Sends a log message to all loggers.
     */
    public function logToAll()
    {
        $channels = config('loggers.types');

        $loggerData = uuid_create();

        foreach ($channels as $channel => $config) {
            $this->loggerFactory->sendByLogger($loggerData, $channel);
        }
    }

}
