<?php

namespace App\Http\Controllers;

use App\Facades\MeuCarrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{

    public function carrinhoLista() {
        $itens = MeuCarrinho::getItens();
        $quantidadeTotalItens = MeuCarrinho::getTotalQuantity();
        return view('site.carrinho', compact('itens', 'quantidadeTotalItens'));
    }

    public function adicionaCarrinho(Request $request) {
        
        MeuCarrinho::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => (float) $request->price,
            'quantity' => (int) $request->qnt,
            'image' => $request->img
        ]);

        return redirect()->route('site.carrinho')->with('success', 'Produto adicionado ao carrinho.');
    }

    public function removeCarrinho(int $id)
    {
        MeuCarrinho::remove($id);

        return redirect()->route('site.carrinho')->with('success', 'Você removeu o produto.');
    }

    public function atualizaCarrinho(Request $request, int $id)
    {
        $novaQuantidade = (int) $request->qnt;
        
        MeuCarrinho::update($id, $novaQuantidade);
    }
}
