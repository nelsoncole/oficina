<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
     // Criar um novo utilizador
     public function store(Request $request)
     {
        $request->validate([
            'nome' => 'required|string|max:255',
         ]);

         $funcionario = new Funcionario ;
         $funcionario->nome= $request->nome;
         $funcionario->rg = "NULL";//$request->rg;
         $funcionario->cpf = $request->cpf;
         $funcionario->funcao = $request->funcao;
         $funcionario->data_hora = date('Y-m-d H:i:s');
         $funcionario->status_funcionario = false;
         $funcionario->data_nascimento= $request->data_nascimento;
         $funcionario->telefone = $request->telefone;
         $funcionario->save();

         // criar o login

         $name = "";
         $email = "1234";
         $password = "1234";    
         User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password), // Criptografa a senha
         ]);


        // enviar SMS de credencias do usuario

        return redirect()->back();
     }
 
}
