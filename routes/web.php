<?php

use App\Http\Controllers\LoggerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* For testing */
Route::get('/log/{type}', [LoggerController::class, "logTo"]);
Route::get('/log-default', [LoggerController::class, "log"]);
Route::get('/log-to-all', [LoggerController::class, "logToAll"]);
