<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BrandsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('brands', BrandsController::class);

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
