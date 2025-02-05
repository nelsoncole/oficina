<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
</head>
<body style="margin: 30px 30px 30px 30px; font-size: 18px;">

    <h3 style="text-align: center;">{{ $titulo }}</h3>

    <p>Nome do Proprietário: {{ $nome }}</p>
    <p>Modelo: {{ $modelo }}</p>
    <p>Marca: {{ $marca }}</p>
    <p>Placa: {{ $placa }}</p>
    <p>Fabricação: {{ $fabricacao }}</p>
    <p>Ano: {{ $ano }}</p>
    <p>Cor: {{ $cor }}</p>
    <p>Estado: {{ $estado }}</p>
    <p>Tipo de Avaria: {{ $tipo_de_avaria }}</p>

    <p></p>
    <p></p>
    <div style="text-align:center;">
        @if(isset($qr_code))
            <img src="data:image/png;base64, {!! base64_encode($qr_code) !!}" />
        @endif
    </div>
 
</body>
</html>