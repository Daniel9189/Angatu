@extends('site.layout')

@section('title', 'Home Page')

@section('conteudo')

@include('includes.mensagem', ['titulo' => 'Mensagem Importante'])

@component('components.sidebar')
    @slot('titulo')
        Let's go, Brasil!
    @endslot

    @slot('paragrafo')
        World Cup is coming!
    @endslot
    @endcomponent

@endsection

@push('style')
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endpush

@push('script')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endpush