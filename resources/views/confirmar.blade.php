<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
</head>
<body>
    <h1>Registo efetuado com sucesso!</h1>
    <p>Baixe o recibo abaixo:</p>

    <button onclick="baixarPdfERedirecionar()">Baixar PDF e Continuar</button>

    <script>
    function baixarPdfERedirecionar() {
         // Converte os dados PHP para JSON e depois para uma query string
        let dados = @json($dados); // Converte PHP para um objeto JavaScript
        let queryString = new URLSearchParams(dados).toString(); // Converte para formato de URL

        // Abre o PDF em uma nova aba passando os dados na URL
        window.open("{{ route('gerar.carro.pdf') }}?" + queryString, "_blank");

        // Aguarda 3 segundos e redireciona para o formulário
        setTimeout(() => {
            window.location.href = "{{ route('formulario', ['form' => 'registrar_viatura']) }}";
        }, 3000);
    }
</script>
</body>
</html>
