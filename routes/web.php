<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::redirect('/', '/home');

Route::get('/home', [HomeController::class, 'index']);
Route::get('/classes', [HomeController::class, 'classes']);
