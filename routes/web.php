<?php

use App\Http\Controllers\Articales\ArticaleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('Articales',ArticaleController::class);



