<?php

use App\Http\Controllers\app\DomainController;
use App\Http\Controllers\app\OnbordingController;
use App\Http\Controllers\app\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee')->group(function(){


    Route::middleware('auth:employee')->group(function(){

    });
});
