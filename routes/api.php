<?php
use App\Http\Controllers\API\CarApiController;
use App\Http\Controllers\API\OwnerApiController;

Route::apiResource('cars', CarApiController::class);
Route::apiResource('owners', OwnerApiController::class);

