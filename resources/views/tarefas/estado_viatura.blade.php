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
        <button type="submit" class="btn btn-nel">Imprimir Relatorio</button>
    </div> 
    <table class="table table-hover text-nowrap">
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