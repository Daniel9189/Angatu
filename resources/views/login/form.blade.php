@if ($mensagem = Session::get('erro'))
    {{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif


{{-- <form action="{{ route('login.auth') }}" method="POST">
    @csrf
    E-mail: <br> <input name="email"> <br><br>
    Senha: <br> <input type="password" name="password"> <br><br>
    <input type="checkbox" name="remember"> Lembrar-me <br><br>
    <button type="submit">Entrar</button>
    
</form> --}}

@extends('site.layout') <!-- Ajuste para o nome do layout que você usa -->

@section('conteudo')
<div class="container" style="margin-top: 5vh; margin-bottom: 5vh;">
    <div class="row">
        <!-- Grid: Centraliza o card e define o tamanho dependendo da tela -->
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            
            <!-- Card de Login com sombra (z-depth) e bordas arredondadas -->
            <div class="card z-depth-3" style="border-radius: 8px;">
                <div class="card-content" style="padding: 40px;">
                    
                    <h4 class="center-align" style="font-weight: bold; margin-bottom: 40px; color: #333;">
                        Entrar no Angatu
                    </h4>

                    <!-- Formulário apontando para a rota de login padrão do Laravel -->
                    <form method="POST" action="{{ route('login.auth') }}">
                        @csrf

                        <!-- Campo de E-mail -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix" style="color: #9e9e9e;">email</i>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">E-mail</label>
                                
                                <!-- Exibição de Erro de Validação -->
                                @error('email')
                                    <span class="red-text" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo de Senha -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix" style="color: #9e9e9e;">lock</i>
                                <input id="password" type="password" name="password" required>
                                <label for="password">Senha</label>
                                
                                @error('password')
                                    <span class="red-text" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Extras: Lembrar-me e Recuperação de Senha -->
                        <div class="row" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
                            <div class="col s6">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in" />
                                    <span>Lembrar-me</span>
                                </label>
                            </div>
                            <div class="col s6 right-align">
                                @if (Route::has('password.request'))
                                    <a href="" class="green-text text-darken-2">Esqueceu a senha?</a>
                                @endif
                            </div>
                        </div>

                        <!-- Botão Principal -->
                        <div class="row" style="margin-top: 20px;">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-light green darken-1" style="width: 100%; border-radius: 4px; height: 48px; font-size: 16px;">
                                    Continuar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Rodapé do Card (Call to Action para Registro) -->
                <div class="card-action center-align" style="background-color: #f9f9f9; border-radius: 0 0 8px 8px;">
                    <p style="margin: 0; color: #666;">
                        Novo no Angatu? 
                        <a href="" class="green-text text-darken-3" style="font-weight: bold; margin-left: 5px;">
                            Crie sua conta
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection