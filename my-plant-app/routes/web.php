<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlntController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plnts', [PlntController::class, 'index']);