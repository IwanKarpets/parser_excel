<?php

use App\Controllers\HomeController;
use App\Controllers\ProductsController;
use App\Kernel\Router\Route;



return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/home', [HomeController::class, 'index']),
    Route::post('/', [HomeController::class, 'store']),
    Route::get('/products', [ProductsController::class, 'index']),
];
