{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif


<form action="{{ route('user.store') }}" method="POST">
    @csrf
    Nome: <br> <input type="text" name="firstName" > <br><br>
    Sobrenome: <br> <input type="text" name="lastName"> <br><br>
    E-mail: <br> <input type="email" name="email"> <br><br>
    Senha: <br> <input type="password" name="password">
    <button type="submit">Cadastrar</button>
</form> --}}

@extends('site.layout')

@section('conteudo')
<div class="container" style="margin-top: 5vh; margin-bottom: 5vh;">
    <div class="row">
        <!-- Grid: Centraliza o card -->
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            
            <div class="card z-depth-3" style="border-radius: 8px;">
                <div class="card-content" style="padding: 40px;">
                    
                    <h4 class="center-align" style="font-weight: bold; margin-bottom: 40px; color: #333;">
                        Crie sua conta
                    </h4>

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <!-- Linha 1: Nome e Sobrenome (Lado a lado em telas médias/grandes) -->
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix" style="color: #9e9e9e;">person</i>
                                <input id="firstName" type="text" name="firstName" value="{{ old('firstName') }}" required autofocus>
                                <label for="firstName">Nome</label>
                                @error('firstName')
                                    <span class="red-text" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="input-field col s12 m6">
                                <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required>
                                <label for="lastName">Sobrenome</label>
                                @error('lastName')
                                    <span class="red-text" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Linha 2: E-mail -->
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix" style="color: #9e9e9e;">email</i>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                                <label for="email">E-mail</label>
                                @error('email')
                                    <span class="red-text" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Linha 3: Senha Confirmação de Senha -->
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix" style="color: #9e9e9e;">lock</i>
                                <input id="password" type="password" name="password" required>
                                <label for="password">Senha</label>
                                @error('password')
                                    <span class="red-text" style="font-size: 12px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="password_confirmation" type="password" name="password_confirmation" required>
                                <label for="password_confirmation">Confirmar Senha</label>
                            </div>
                        </div>

                        <!-- Botão de Cadastro -->
                        <div class="row" style="margin-top: 20px;">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-light green darken-1" style="width: 100%; border-radius: 4px; height: 48px; font-size: 16px;">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Rodapé do Card (Link de volta para o Login) -->
                <div class="card-action center-align" style="background-color: #f9f9f9; border-radius: 0 0 8px 8px;">
                    <p style="margin: 0; color: #666;">
                        Já tem uma conta? 
                        <a href="{{ route('login.form') }}" class="green-text text-darken-3" style="font-weight: bold; margin-left: 5px;">
                            Entrar
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection