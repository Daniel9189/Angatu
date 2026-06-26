<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::resource('products', ProductController::class);
// Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/product/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categorias/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addcarrinho');
Route::delete('/carrinho/{id}', [CarrinhoController::class, 'removeCarrinho'])->name('site.removecarrinho');
Route::put('/carrinho/{id}', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizacarrinho');
Route::delete('/carrinho', [CarrinhoController::class, 'limpaCarrinho'])->name('site.limpacarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'checkemail']);
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');

Route::get('/pesquisa', [ProductController::class, 'search'])->name('site.search');