@extends('site.layout')

@section('title', 'Home Page')

@section('conteudo')

<div class="row container" style="display: flex; flex-wrap: wrap;">
    @foreach ($products as $product)
    <div class="col s12 m4 l3 container" style="display: flex;">
        <div class="card">
            <div class="card-image" style="flex: 1;">
                <img src="{{ $product->imagem }}">
                @can('ver-product', $product)    
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="{{ route('site.details', $product->slug) }}"><i class="material-icons">visibility</i></a>
                @endcan
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
    {{ $products->links('custom.pagination') }}
</div>

@endsection