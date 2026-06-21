@extends('site.layout')

@section('titulo', 'Busca')

@section('conteudo')

    <div class="container">

        <div class="row">
            <div class="col s12">
                <h4>Resultados para: {{ $busca }}</h4>
                <p>Encontramos {{ $products->total() }} produto(s)</p>
            </div>
        </div>
        
        <div class="row container" style="display: flex; flex-wrap: wrap;">
            @forelse ($products as $product)
                <div class="col s12 m4 l3 container" style="display: flex;">
                    <div class="card">
                        <div class="card-image" style="flex: 1;">
                            <img src="{{ $product->imagem }}">
                            @can('ver-product', $product)
                                <a class="btn-floating halfway-fab waves-effect waves-light red"
                                    href="{{ route('site.details', $product->slug) }}"><i
                                        class="material-icons">visibility</i></a>
                            @endcan
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{ $product->nome }}</span>
                            <p>{{ Str::limit($product->descricao, 20) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col s12">
                    <p class="center-align">Nenhum produto encontrado para sua busca</p>
                </div>
            @endforelse
        </div>

        <div class="row center-align">
            {{ $products->appends(['q' => $busca])->links() }}
        </div>
    </div>


@endsection
