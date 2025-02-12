<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
     // Listar todos os utilizadores
    public function index()
    {
         $utilizadores = Cliente::leftJoin('users', 'clientes.id_cliente', '=', 'users.id_cliente')->select('clientes.*','users.nivel_de_acesso')->get();
         return $utilizadores;
    }


    public function showRegisterForm()
    {
        return view('auth.criar');
    }

    // Função para cadastrar um novo usuário
    public function criar(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:4',
            'sexo' => 'required|string|max:255',
            'dtnascimento' => 'required|date',
            'cpf' => 'required|string|unique:clientes',
            'rg' => 'required|string|unique:clientes',
            'documento' => 'required|file|mimes:jpg,jpeg,png,gif,pdf|max:8192', // 8MB Máximo
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'nivel_de_acesso' => 'required|string|max:255',
        ]);


        $nomeArquivo = $request->documento;
        // Armazena o arquivo na pasta "public/uploads"
        if ($request->hasFile('documento')) {
            $arquivo = $request->file('documento');

            // Define o caminho diretamente na pasta "public/uploads"
            $nomeArquivo = uniqid() . '.' . $arquivo->getClientOriginalExtension();
            $caminho = public_path('uploads'); // Caminho completo

            // Move o arquivo para "public/uploads"
            $arquivo->move($caminho, $nomeArquivo);

        }

        $cliente = new Cliente();
        $cliente->nome = $request->name;
        $cliente->email = $request->email;
        $cliente->sexo = $request->sexo;
        $cliente->dtnascimento = $request->dtnascimento;
        $cliente->cpf = $request->cpf;
        $cliente->documento = $nomeArquivo;
        $cliente->endereco = $request->endereco;
        $cliente->bairro = $request->bairro;
        $cliente->telefone = $request->telefone;
        $cliente->rg = $request->rg;
        $cliente->orgaoexpedidor = '';
        $cliente->cep = 0;
        $cliente->numero = 0;

        if($cliente->save()){

            $cliente->refresh();
            $id = $cliente->id_cliente;
            // Criando usuário e hash da senha com Bcrypt automaticamente
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Criptografa a senha
                'nivel_de_acesso' => $request->nivel_de_acesso,
                'id_cliente' => $id,
            ]);

            return redirect('/login');
        }

        return redirect('/criar'); // erro
    }
}
