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
        <form action="{{ route('site.addcarrinho') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->nome}}">
            <input type="hidden" name="price" value="{{ $product->preco }}'">
            <input type="number" name="qnt" value="1">
            <input type="hidden" name="img" value="{{ $product->imagem }}">
            <button class="btn orange btn-large"> Comprar </button>
        </form>
    </div>
</div>

@endsection