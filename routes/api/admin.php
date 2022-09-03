<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PointController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:admins')->group(function(){

        Route::get('/me', [AuthController::class, 'me'])->name('me');
        Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('changePassword');


        Route::group(['prefix'=>'employee','as'=>'employee.'], function(){

            Route::get('/getCep/{cep}', [EmployeeController::class, 'getCep'])->name('getCep');

            Route::get('/', [EmployeeController::class, 'index'])->name('index');
            Route::get('/{employee}', [EmployeeController::class, 'show'])->name('show');
            Route::post('/', [EmployeeController::class, 'store'])->name('store');
            Route::put('/{employee}', [EmployeeController::class, 'update'])->name('update');
            Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');

        });

        Route::group(['prefix'=>'point','as'=>'point.'], function(){


            Route::get('/listAll', [PointController::class, 'listAll'])->name('listAll');
            Route::get('/listPoint', [PointController::class, 'listPoint'])->name('listPoint');

        });

    });

});
