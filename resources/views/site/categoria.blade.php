@extends('site.layout')

@section('title', 'Categoria')

@section('conteudo')

    <div class="row container" style="display: flex; flex-wrap: wrap;">

    <h3>Categoria: </h3>

    @foreach ($products as $product)
        <div class="col s12 m4 container" style="display: flex;">
            <div class="card">
                <div class="card-image" style="flex: 1;">
                    <img src="{{ $product->imagem }}">
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{ route('site.details', $product->slug) }}"><i class="material-icons">visibility</i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">{{ $product->nome }}</span>
                    <p>{{ Str::limit($product->descricao, 20) }}</p>
                </div>
            </div>
        </div>
    @endforeach

    </div>

    <div class="row center">
        {{ $products->links('custom.pagination')}}
    </div>
@endsection