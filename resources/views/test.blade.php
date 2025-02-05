<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

<?php
if (Auth::check()) {
    echo "Usuário está logado!";
} else {
    echo "Usuário não está logado!";
} ?>

    <a href="{{ route('qrcode.view') }}" target="_blank">Abrir QR Code em Nova Aba</a>
</body>
</html>