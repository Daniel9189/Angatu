@if ($mensagem = Session::get('erro'))
    {{ $mensagem }}
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif


<form action="{{ route('login.auth') }}" method="POST">
    @csrf
    E-mail: <br> <input name="email"> <br><br>
    Senha: <br> <input type="password" name="password"> <br><br>
    <input type="checkbox" name="remember"> Lembrar-me <br><br>
    <button type="submit">Entrar</button>
    
</form>