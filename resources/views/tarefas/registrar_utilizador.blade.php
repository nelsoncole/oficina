<?php
// Formulário utilizadores
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
<div class="panel-heading text-center"><h3>UTILIZADORES</h3></div>
<div class="panel-body table-responsive p-0">
    <div class="input-group mb-3">
    <button type="submit" class="btn btn-nel" data-bs-toggle="modal" data-bs-target="#model_registrar_utilizador">Registrar Utilizador</button>

    </div> 
    <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Função</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query_utilizadores as $key=>$utilizadores)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$utilizadores->codigo}}</td>
                    <td>{{$utilizadores->nome}}</td>
                    <td>{{$utilizadores->telefone}}</td>
                    <td>{{$utilizadores->funcao}}</td>
                    <td style="text-align: center;">
                    <a href="#" id="btn-form2" class="nav-link" style="padding: 0; margin: 0;">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('tarefas.model.model_registrar_utilizador')
