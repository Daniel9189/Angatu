<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/product/{slug}', [SiteController::class, 'details'])->name('site.details');

Route::get('/categorias/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');

Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addcarrinho');

Route::delete('/carrinho/{id}', [CarrinhoController::class, 'removeCarrinho'])->name('site.removecarrinho');

Route::put('/carrinho/{id}', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizacarrinho');
