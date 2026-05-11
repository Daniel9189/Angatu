<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);


Route::resource('categorias', CategoriaController::class);