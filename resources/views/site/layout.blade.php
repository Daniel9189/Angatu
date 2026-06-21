<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaMenu)
            <li><a href="{{ route('site.categoria', $categoriaMenu->id) }}">{{ $categoriaMenu->nome }}</a></li>
        @endforeach
    </ul>

    <ul id='dropdown2' class='dropdown-content'>

        <li><a href="{{ route('admin.dashboard') }}">Minha Conta</a></li>
        <li><a href="{{ route('login.logout') }}">Sair</a></li>

    </ul>

    <nav class="green">
        <div class="nav-wrapper container" style="display: flex; align-items: center; justify-content: space-between;">

            <a href="{{ route('site.index') }}" class="brand-logo"
                style="position: relative; float: none; display: flex; align-items: center;">
                Angatu
            </a>

            <div class="search-container" style="flex-grow: 1; max-width: 600px; margin: 0 2rem;">
                <form action="{{ route('site.search') }}" method="GET">
                    <div class="input-field white"
                        style="height: 40px; border-radius: 4px; display: flex; align-items: center; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        <input id="search" name="q" value="{{ $busca ?? '' }}" type="search" placeholder="Buscar produtos, marcas e muito mais..."
                            required
                            style="color: #333; height: 100%; margin: 0; border-bottom: none !important; box-shadow: none !important; padding-left: 3rem;">
                        <label class="label-icon" for="search" style="transform: translateY(-12px);">
                            <i class="material-icons" style="color: #666;">search</i>
                        </label>
                    </div>
                </form>
            </div>

            <ul style="display: flex; float: none; margin: 0;">

                <li class="hide-on-med-and-down">
                    <a href="#!" class="dropdown-trigger" data-target="dropdown1">
                        Categorias <i class="material-icons right">expand_more</i>
                    </a>
                </li>

                @auth
                    <li>
                        <a href="#!" class="dropdown-trigger" data-target="dropdown2">
                            Olá, {{ auth()->user()->firstName }} <i class="material-icons right">expand_more</i>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login.form') }}">
                            Login <i class="material-icons right">lock</i>
                        </a>
                    </li>
                @endauth

                <li>
                    <a href="{{ route('site.carrinho') }}" style="display: flex; align-items: center;">
                        <i class="material-icons left">shopping_cart</i>
                        <span class="new badge blue" data-badge-caption=""
                            style="margin-left: 5px; min-width: 18px; height: 18px; line-height: 18px;">
                            {{ \App\Facades\MeuCarrinho::getTotalQuantity() }}
                        </span>
                    </a>
                </li>
            </ul>

        </div>
    </nav>

    @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        var elemDrop = document.querySelectorAll('.dropdown-trigger');

        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>
</body>

</html>






{{-- <h1>Empresa</h1>

Nome do servidor: {{ $nome }} <br><br>

Idade: {{ $idade }} <br><br>

{!! $html !!} --}}
