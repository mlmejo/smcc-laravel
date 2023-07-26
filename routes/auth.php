<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login');

Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
