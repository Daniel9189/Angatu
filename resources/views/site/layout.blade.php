<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    @stack('style')
    
</head>
<body>
    @yield('conteudo')

    @stack('script')
</body>
</html>






{{-- <h1>Empresa</h1>

Nome do servidor: {{ $nome }} <br><br>

Idade: {{ $idade }} <br><br>

{!! $html !!} --}}