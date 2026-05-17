<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/product/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/categorias/{id}', [SiteController::class, 'categoria'])->name('site.categoria');