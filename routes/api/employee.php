<?php

use App\Http\Controllers\Employee\AuthController;
use App\Http\Controllers\Employee\PointController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee')->group(function(){

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:employees')->group(function(){

        Route::get('/me', [AuthController::class, 'me'])->name('me');
        Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');

        Route::group(['prefix'=>'point','as'=>'point.'], function(){
            Route::get('/', [PointController::class, 'index'])->name('index');
            Route::post('/', [PointController::class, 'store'])->name('store');
        });
    });
});
