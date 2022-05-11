<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:admins')->group(function(){

        Route::get('/me', [AuthController::class, 'me'])->name('me');
        Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');


    });

});
