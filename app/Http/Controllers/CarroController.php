<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carro;

use Barryvdh\DomPDF\Facade\Pdf;

class CarroController extends Controller
{

    public function index()
    {
        $carros = Carro::all();
        return $carros;
    }

    public function store(Request $request)
    {
        $controller = new Controller();

        $this->validate($request, [
            'id_cliente' => 'required',
            'cor' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:carros,placa',
            'fabricacao' => 'required|integer|unique:carros,fabricacao',
            'ano' => 'required|integer',
            'tipo' => 'required|string|max:255',
        ]);

        $codigo = $controller->getUuid();
        $estado = 'Em Diagnóstico';
        $preco_de_avaria = 0.0;
        $quantidade = 0;
        $total = 0.0;
        $taxa = 0.0;

        $carro = new Carro ;
        $carro->cor = $request->cor;
        $carro->marca = $request->marca;
        $carro->modelo = $request->modelo;
        $carro->placa = $request->placa;
        $carro->fabricacao = $request->fabricacao;
        $carro->ano= $request->ano;
        $carro->tipo = $request->tipo;
        $carro->estado = $estado;
        $carro->tipo_de_avaria = $request->tipo_de_avaria;
        $carro->preco_de_avaria = $preco_de_avaria;
        $carro->quantidade = $quantidade;
        $carro->total = $total;
        $carro->taxa = $taxa;
        $carro->codigo = $codigo;
        $carro->id_cliente = $request->id_cliente;
        $carro->save();

        $dados = [
            'titulo' => 'Oficina',
            'nome' => '--',
            'modelo' => $request->modelo ?? 'Sem modelo',
            'marca' => $request->marca ?? 'Sem marca',
            'placa' => $request->placa ?? 'Sem placa',
            'fabricacao' => $request->fabricacao ?? 'Desconhecido',
            'ano' => $request->ano ?? 'Desconhecido',
            'cor' => $request->cor ?? 'Desconhecida',
            'tipo' => $request->tipo ?? 'Desconhecido',
            'estado' => $estado ?? 'Não informado',
            'tipo_de_avaria' => $request->tipo_de_avaria ?? 'Não informado',
            'qr_code' => $codigo,
        ];
        

        return view('confirmar', compact('dados'));

        return redirect()->route('formulario', ['form' => 'registrar_viatura']) ->with('mensagem', 'Registo efectuado com sucesso!');
    
    }    
}
