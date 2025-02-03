<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;

use Ramsey\Uuid\Uuid;

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
}
