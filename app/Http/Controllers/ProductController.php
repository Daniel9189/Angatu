<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function Laravel\Prompts\search;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->paginate(5);
        $categorias = Categoria::all();
        
        return view('admin.products', compact('products', 'categorias'));
        
        // return view('site.empresa', [
        //     'nome' => $nome,
        //     'idade' => $idade,
        //     'html' => $html
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'id_user' => 'required|integer',
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'required|string',
            'id_categoria' => 'required|integer',
            'imagem' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        
        if ($request->hasFile('imagem')) {
            $product['imagem'] = $request->imagem->store('products');
        }

        $product['slug'] = Str::slug($request->nome);
        
        $product['id_user'] = auth()->user()->id;
        
        Product::create($product);
        
        return to_route('admin.products')->with('success', 'Produto cadastrado com sucesso.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return to_route('admin.products')->with('success', 'O produto foi excluido com sucesso.');
    }

    public function search(Request $request)
    {
        $busca = $request->input('q');
        
        if ($busca) {
            $products = Product::where('nome', 'LIKE', "%{$busca}%")
            ->orWhere('descricao', 'LIKE', "%{$busca}%")
            ->paginate(12);
        }
        else {
            $products = Product::paginate(12);
        }

        return view('site.search', compact('products', 'busca'));
    }
}