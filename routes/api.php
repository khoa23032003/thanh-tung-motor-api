<?php

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//route thêm
Route::apiResource('brands', BrandsController::class);

Route::get('/test', [TestController::class, 'index']);
