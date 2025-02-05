<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{

    public function index()
    {
        $servico = Servico::all();
        return $servico;
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        $servico = new Servico;
        $servico->descricao = $request->descricao;
        $servico->valor = $request->valor;
        $servico->save();

        return redirect()->back();
    
    }   
}
