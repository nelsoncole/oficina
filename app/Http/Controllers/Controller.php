<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getEnumColorCorro(){
        return $this->getEnum('carros', 'cor');
    }

    public function getEnumMarcaCorro(){
        return $this->getEnum('carros', 'marca');
    }

    public function getEnumTipoCorro(){
        return $this->getEnum('carros', 'tipo');
    }

    private function getEnum($tabela, $coluna)
    {
        
        $type = DB::selectOne("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
                               WHERE TABLE_NAME = ? AND COLUMN_NAME = ?", [$tabela, $coluna]);

        preg_match_all("/'([^']+)'/", $type->COLUMN_TYPE, $matches);

        return $matches[1];
    }

    public function getUuid(){
        $uuid = Uuid::uuid4();
        return strtoupper(substr($uuid->toString(), 0, 8)); //Pegar apenas os primeiros 8 caracteres
    }

    public function gerarQRCode($value){
        $qr_code = QrCode::size(200)->generate($value);
        return $qr_code;
        //return view('qrcode', compact('qr_code'));
        //QrCode::format('png')->size(300)->generate($value, public_path('qrcode.png'));
    }

    public function gerarPDFCarro(Request $request){
        $d = $request->all();

        $qr_code = $this->gerarQRCode($d['qr_code']);
        $dados = [
            'titulo' => $d['titulo']?? 'Sem modelo',
            'nome' => $d['nome']?? 'Sem modelo',
            'modelo' => $d['modelo']?? 'Sem modelo',
            'marca' => $d['marca'] ?? 'Sem marca',
            'placa' => $d['placa'] ?? 'Sem placa',
            'fabricacao' => $d['fabricacao'] ?? 'Desconhecido',
            'ano' => $d['ano'] ?? 'Desconhecido',
            'cor' => $d['cor'] ?? 'Desconhecida',
            'tipo' => $d['tipo'] ?? 'Desconhecido',
            'estado' => $d['estado'] ?? 'Não informado',
            'tipo_de_avaria' => $d['tipo_de_avaria'] ?? 'Não informado',
            'qr_code' => $qr_code,
        ];

        $pdf = Pdf::loadView('docs.recibo_registro', $dados);
        return $pdf->stream('Recibo.pdf');
        // return $pdf->download(documento.pdf); // para forcar o download
    }

    public function RotaSecretaria(){
        $formulario = request('form') ?? 'registrar_viatura';
    $controller = new Controller();
    
    $enum_cor=$controller->getEnumColorCorro();
    $enum_marca=$controller->getEnumMarcaCorro();
    $enum_tipo=$controller->getEnumTipoCorro();

    $carro = new CarroController();
    $query_carros = $carro->index();

    $utilizador = new UserController();
    $query_utilizadores = $utilizador->index();

    $servicos = new ServicoController();
    $query_servicos = $servicos->index();

    return view('secretaria', compact('formulario','enum_cor','enum_marca','enum_tipo','query_carros','query_utilizadores','query_servicos'));
    }

    public function RotaAdmin(){
        $formulario = request('form') ?? 'registrar_viatura';
    
        return view('secretaria', compact('formulario'));
    }

    public function RotaTecnico(){
        $formulario = request('form') ?? 'registrar_viatura';
    
        return view('secretaria', compact('formulario'));
    }

    public function RotaGerente(){
        $formulario = request('form') ?? 'registrar_viatura';
    
        return view('secretaria', compact('formulario'));
    }

    public function RotaCliente(){
        $formulario = request('form') ?? 'registrar_viatura';
    
        return view('secretaria', compact('formulario'));
    }

}
