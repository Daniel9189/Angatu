@extends('site.layout')

@section('title', 'Detalhes')

@section('conteudo')
    
<div class="row container"> <br>
    <div class="col s12 m6">
        <img src="{{$product->imagem}}" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h4>{{$product->nome}}</h4>
        <p>{{$product->descricao}}</p>
        <p>R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
        <p>Postado por: {{$product->user->firstName}}</p>
        <p>Categoria: {{$product->categoria->nome}}</p>
        <button class="btn orange btn-large"> Comprar </button>
    </div>
</div>

@endsection