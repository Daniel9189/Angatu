<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate();
        
        return view('site.home', compact('products'));
    }

    public function details(String $slug) {
        $product = Product::query()->where('slug', $slug)->first();

        return view('site.details', compact('product'));
        
    }

    public function categoria(int $id) {
        $categoria = Categoria::query()->find($id);
        $products = Product::query()->where('id_categoria', $id)->paginate(3);
        return view('site.categoria', compact('products', 'categoria'));
    }

}
