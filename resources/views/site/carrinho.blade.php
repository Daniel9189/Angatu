@extends('site.layout')

@section('title', 'Carrinho')

@section('conteudo')

    <div class="container">
        @if ($mensagem = session()->get('success'))
            <div class="card green darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Feito!</span>
                    <p>{{ $mensagem }}</p>
                </div>
            </div>
        @endif
    </div>

    <div class="row container" style="display: flex; flex-wrap: wrap;">
    

        <h4>Seu carrinho possui {{ $quantidadeTotalItens }} produtos.</h4>

        <table class="highlight responsive-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            
            @foreach ($itens as $item)
                <tbody>
                    <tr>
                        <td><img src="{{ $item->image }}" alt="" width="100" class="responsive-img circle"></td>
                        <td>{{ $item->name }}</td>
                        <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>
                        
                        {{-- Botão Atualizar--}}
                        <form action="{{ route('site.atualizacarrinho', ['id'=>$item->id]) }}">
                            @csrf
                            @method('PUT')
                            <td><input type="number" style="width: 60px; font-weight: bold;" class="white center" name="quantity" value="{{ $item->quantity }}"></td>
                            
                            <td>
                                <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                        </form>

                                {{-- Botão Remover--}}
                                <form action="{{ route('site.removecarrinho', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        
        <div class="row container center">
            <br>
            <td><button class="btn waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></button></td>
        
            <td><button class="btn waves-effect waves-light red">Limpar Carrinho<i class="material-icons right">delete</i></button></td>

            <td><button class="btn waves-effect waves-light green">Finalizar Compra<i class="material-icons right">check</i></button></td>
        </div>
    </div>

@endsection