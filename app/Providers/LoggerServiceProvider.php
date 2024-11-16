<?php

namespace App\Providers;

use App\Factories\LoggerFactory;
use App\Interfaces\LoggerInterface;
use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LoggerInterface::class, LoggerFactory::class);
    }
}
