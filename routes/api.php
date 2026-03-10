<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//route thêm
Route::apiResource('brands', BrandsController::class);
