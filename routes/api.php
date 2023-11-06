<?php

use App\Http\Controllers\Api\GenerateController;
use Illuminate\Support\Facades\Route;

Route::post('/generate', GenerateController::class)
    ->name('api.generate');
