<?php

use App\Http\Controllers\OwnersController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('owners', OwnersController::class);
Route::resource('cars', CarController::class);
