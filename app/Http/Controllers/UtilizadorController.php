<?php

namespace App\Http\Controllers;

use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilizadorController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $utilizador = Auth::user();
        $token = $utilizador->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login bem-sucedido',
            'token' => $token,
            'user' => $utilizador
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }


    // Listar todos os utilizadores
    public function index()
    {
        $utilizadores = Utilizador::all();
        return $utilizadores;
    }

    // Exibir um utilizador específico
    public function show($id)
    {
        $utilizador = Utilizador::findOrFail($id);
        return response()->json($utilizador);
    }

    // Criar um novo utilizador
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $utilizador = Utilizador::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($utilizador, 201);
    }

    // Atualizar um utilizador
    public function update(Request $request, $id)
    {
        $utilizador = Utilizador::findOrFail($id);

        $utilizador->update($request->only(['name', 'email']));

        return response()->json($utilizador);
    }

    // Excluir um utilizador
    public function destroy($id)
    {
        $utilizador = Utilizador::findOrFail($id);
        $utilizador->delete();

        return response()->json(['message' => 'Utilizador excluído com sucesso']);
    }
}
