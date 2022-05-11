<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:admins')->group(function(){

        Route::get('/me', [AuthController::class, 'me'])->name('me');
        Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');


        Route::group(['prefix'=>'employee','as'=>'employee.'], function(){

            Route::get('/getCep/{cep}', [EmployeeController::class, 'getCep'])->name('getCep');

            Route::get('/', [EmployeeController::class, 'index'])->name('index');
            Route::post('/', [EmployeeController::class, 'store'])->name('store');

            Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');

        });

    });

});
