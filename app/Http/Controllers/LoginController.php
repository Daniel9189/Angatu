<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    public function auth(Request $request) {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],
        [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail válido',
            'password.required' => 'O campo senha é obrigatório'
        ]);
        
        if (Auth::attempt($credenciais, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->back()->with('erro', 'E-mail ou senha inválida.');
        }
    }
    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.index');
    }

    public function create(Request $request) {
        return view('login.create');
    }
}