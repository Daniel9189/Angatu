@extends('site.layout')

@section('title', 'Home Page')

@section('conteudo')


{{-- Estruturas de repetição --}}

Frutas que eu não gosto: <br><br>
@forelse ($frutasQueEuNaoGosto as $fruta)
    {{$fruta}} <br>
    
@empty
    Gosto de todas as frutas!
@endforelse

<br><br>

Frutas que eu gosto: <br><br>
@foreach ($frutasQueEuGosto as $fruta)
    {{$fruta}} <br>
@endforeach

<br><br>

@php
    $i = 1;
@endphp

While <br><br>
@while ($i < 11)
    valor atual é {{ $i }}<br>
    @php
        $i++;
    @endphp
@endwhile

<br><br>

For<br><br>
@for ($i = 0; $i < 11; $i++)
    valor atual é {{ $i }} <br>
@endfor

@endsection