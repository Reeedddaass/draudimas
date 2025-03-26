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

Route::middleware(['auth'])->group(function () {
    Route::resource('cars', CarController::class);
});

Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::resource('owners', OwnersController::class)->except(['index', 'show']);
    Route::resource('cars', CarController::class)->except(['index', 'show']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('owners', OwnersController::class)->only(['index', 'show']);
    Route::resource('cars', CarController::class)->only(['index', 'show']);
});

