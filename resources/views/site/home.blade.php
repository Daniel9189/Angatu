@extends('site.layout')

@section('title', 'Home Page')

@section('conteudo')


{{-- Estruturas de controle --}}


@guest
    não autenticado
@endguest

<br><br>

@auth
    autenticado
@endauth
Não entrou na condião de autenticação

<br><br>

@empty($nome)
está vazia
@else
não está vazia
@endempty

<br><br>

@isset($nome)
existe
@endisset

<br><br>

@switch($idade)
    @case(18)
        true
        @break
    @case(25)
        false
        @break
    @default
        padron
@endswitch

<br><br>

@unless ($nome == 'Jordecleison')
    true
@else
    false
@endunless

<br><br>

@if ($nome == 'Daniel')
    Bem-vindo, Daniel! Que bom ter você aqui!
@else
    Cadê Daniel? Ele é o melhor aluno do curso!
@endif

@endsection