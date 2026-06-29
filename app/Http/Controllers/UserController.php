<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ], [
            'firstName.required' => 'Preencha o campo Nome',
            'firstName.max' => 'O nome deve ter no máximo 50 caracteres',
            'lastName.required' => 'Preencha o campo Sobrenome',
            'lastName.max' => 'O sobrenome deve ter no máximo 50 caracteres',
            'email.required' => 'Preencha o campo E-mail',
            'email.email' => 'Digite um e-mail válido',
            'email.max' => 'O e-mail deve ter no máximo 255 caracteres',
            'email.unique' => 'Este e-mail já está cadastrado no sistema',
            'password.required' => 'Preencha o campo Senha',
            'password.min' => 'O campo Senha deve conter no mínimo 6 caracteres',
            'password.confirmed' => 'As senhas digitadas não coincidem',
        ]);
        $user['password'] = Hash::make($request->password);

        $user = User::create($user);

        Auth::login($user);

        return to_route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}