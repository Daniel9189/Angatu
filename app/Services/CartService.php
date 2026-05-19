<?php


namespace App\Services;


class CartService
{
    private $sessionKey = 'meu_carrinho';


    public function getItens()
    {
        $meusProdutos = session()->get($this->sessionKey, []);

        $itensObjetos = array_map(function($item) {
            return (object) $item;
        }, $meusProdutos);
        
        return collect($itensObjetos);
    }


    public function add(array $product)
    {
        $carrinho = session()->get($this->sessionKey, []);
        $id = $product['id'];

        if(isset($carrinho[$id])) {
            $carrinho[$id]['quantity'] += $product['quantity'];
        } else {
            $carrinho[$id] = $product;
        }

        session()->put($this->sessionKey, $carrinho);
    }


    public function remove(int $id)
    {
        $carrinho = $this->getItens();
        if(isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put($this->sessionKey, $carrinho);
        }   

    }    


    public function getTotalValue()
    {
        $total = 0;
        foreach ($this->getItens() as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }


    public function getTotalQuantity()
    {
        $quantidadeTotalItens = $this->getItens()->sum('quantity');
        return $quantidadeTotalItens;
    }


    public function update(int $id, int $novaQuantidade)
    {
        $carrinho = session()->get($this->sessionKey, []);
        foreach ($carrinho as $key => $item) {
            if ($item['id'] == $id) {
                if ($novaQuantidade >= 0) {
                    unset($carrinho[$key]);
                } else {
                    $carrinho[$key]['quantity'] = $novaQuantidade;
                }
                break;
            }
        }
        session()->put($this->sessionKey, $carrinho);
    }


    public function clear()
    {
        session()->forget($this->sessionKey);
    }
}