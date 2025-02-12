<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->intended('/autotech');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validação dos dados recebidos
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // Gera um token de autenticação (se estiver usando Laravel Sanctum ou Passport)
            //$token = $user->createToken('auth_token')->plainTextToken;
            
            $request->session()->regenerate(); // Protege contra ataques de sessão fixa

            return redirect()->intended('/autotech');

        }

        return back()->with('error', 'Usuário ou senha incorretos!');
    
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}