<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IlluminUserate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
{
    // Validação dos dados recebidos

    // Busca o usuário pelo e-mail
    $user = User::where('email', $request->email)->first();

    // Verifica se a senha está correta
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Usuário ou senha incorretos!'
        ], 401);
    }

    // Gera um token de autenticação (se estiver usando Laravel Sanctum ou Passport)
    $token = $user->createToken('auth_token')->plainTextToken;

    return redirect('/secretaria');
    
}


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }


    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    // Função para cadastrar um novo usuário
    public function signup(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:4'
        ]);

        // Criando usuário e hash da senha com Bcrypt automaticamente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Criptografa a senha
        ]);

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso!',
            'user' => $user
        ], 201);
    }
}