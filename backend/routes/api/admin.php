<?php

use App\Http\Controllers\app\DomainController;
use App\Http\Controllers\app\OnbordingController;
use App\Http\Controllers\app\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){


    Route::middleware('auth:admin')->group(function(){

    });

});
