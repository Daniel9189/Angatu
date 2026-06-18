<?php

namespace App\Http\Controllers;

use App\Facades\MeuCarrinho;
use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate();
 
        return view('site.home', compact('products'));
    }
    

    public function details(String $slug) {
        $product = Product::query()->where('slug', $slug)->first(); 
        // auth()->user()?->can('verProduct', $product)
        if (Gate::allows('ver-product', $product)) {
            return view('site.details', compact('product'));
        }

        return to_route('site.index');
        
    }

    
    public function categoria(int $id) {
        $categoria = Categoria::query()->find($id);
        $products = Product::query()->where('id_categoria', $id)->paginate(3);
        return view('site.categoria', compact('products', 'categoria'));
    }

}