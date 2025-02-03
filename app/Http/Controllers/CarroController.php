<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Carro;

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
        $tipo_de_avaria = 'Indefinido';
        $preco_de_avaria = 0.0;

        $carro = new Carro ;
        $carro->cor = $request->cor;
        $carro->marca = $request->marca;
        $carro->modelo = $request->modelo;
        $carro->placa = $request->placa;
        $carro->fabricacao = $request->fabricacao;
        $carro->ano= $request->ano;
        $carro->tipo = $request->tipo;
        $carro->estado = $estado;
        $carro->tipo_de_avaria = $tipo_de_avaria;
        $carro->preco_de_avaria = $preco_de_avaria;
        $carro->codigo = $codigo;
        $carro->id_cliente = $request->id_cliente;
        $carro->save();

        //return redirect(route('registrar_viatura'))->with('message', 'Registo efectuado com sucesso');
        return redirect()->route('formulario', ['form' => 'registrar_viatura']) ->with('mensagem', 'Registo efectuado com sucesso!');
    
    }    
}
