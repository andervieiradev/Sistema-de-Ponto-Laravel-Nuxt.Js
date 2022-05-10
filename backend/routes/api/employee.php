<?php

use App\Http\Controllers\Employee\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee')->group(function(){

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:employees')->group(function(){

        Route::get('/me', [AuthController::class, 'me'])->name('me');
    });
});
