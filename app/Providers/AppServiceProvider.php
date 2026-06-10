<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CartService::class, function ($app) {
            return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);

        Gate::define('ver-produto', function(User $user, Product $product) {
            return $user->id === $product->id_user;
        });

    }
}