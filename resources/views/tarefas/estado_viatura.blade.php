<?php
// Formulário estado viatura
?>


<div style="width: 100%; display: flex; justify-content: flex-end;">
    <div class="input-group input-group-sm" style="width: 200px;">
        <input type="text" name="table_search" class="form-control border-nel-1" placeholder="Pesquisar">
        <div class="input-group-append">
            <button type="submit" class="btn btn-default border-nel-1">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div>
           
<div class="panel panel-default">
<div class="panel-heading text-center"><h3>LISTA DE CARROS</h3></div>
<div class="panel-body table-responsive p-0">
    <div class="input-group mb-3">
        <button onclick="gerarPDFListaCarros()" class="btn btn-nel">Imprimir Relatorio</button>
    </div> 
    <table class="table table-hover text-nowrap" id="id_tabela_carros">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fabricação</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Placa</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query_carros as $key=>$carros)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$carros->codigo}}</td>
                    <td>{{$carros->marca}}</td>
                    <td>{{$carros->modelo}}</td>
                    <td>{{$carros->fabricacao}}</td>
                    <td>{{$carros->ano}}</td>
                    <td>{{$carros->cor}}</td>
                    <td>{{$carros->placa}}</td>
                    <td>{{$carros->tipo}}</td>
                    <td>{{$carros->estado}}</td>
                    <td style="text-align: center;">
                        <a href="#" onclick="Celula(this, 1)" data-bs-toggle="modal" data-bs-target="#model_actualizar_carro" class="nav-link btn btn-sm btn-primary" title="Editar ou Registro" style="padding: 0; margin: 0;">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            <!--span class="bi bi-pencil">Editar</span-->
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('tarefas.model.model_actualizar_carro')

<script>
    function Celula(link, i) {
        event.preventDefault(); // Impede a navegação do link
        // Encontra a linha (<tr>) onde o link foi clicado
        var linha = link.closest("tr");

        // Captura a célula específica com base no índice
        var celula = linha.getElementsByTagName("td")[i];

        document.getElementById("id_model_codeID").value = celula.innerText;
    }

    function gerarPDFListaCarros() {
        // Carrega jsPDF
        const { jsPDF } = window.jspdf;
        //const doc = new jsPDF(); // folha na vertical
        const doc = new jsPDF({ orientation: "landscape" }); // folha na horizontal


        // Adiciona um título ao PDF
        doc.text("Lista de Carros", 14, 10);

        // Converte a tabela HTML para PDF
        doc.autoTable({ html: '#id_tabela_carros', startY: 20 });

        // Baixa o PDF
        //doc.save('carros.pdf');

        // Gera um Blob URL e abre numa nova aba
        const pdfURL = doc.output('bloburl');
        window.open(pdfURL, '_blank');
    }
</script>