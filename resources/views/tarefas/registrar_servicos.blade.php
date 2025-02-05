<?php
// Formulário cadastrar 
?>

<div class="text-center"><h3>REGISTRO DE SERVIÇOS</h3></div>

<form method='POST' action="{{ route('servico.registrar') }}">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text sp-nel border-nel-2" style="width: 180px;">Descrição do Serviço</span>
        </div>
        <input type="text" name="descricao" class="form-control border-nel-2" placeholder="Descrição" required>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text sp-nel border-nel-2" style="width: 180px;">Preço</span>
        </div>
        <input type="text" name="valor" class="form-control border-nel-2" placeholder="Preço" required>
    </div>

    <div class="input-group mb-3">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
   
</form>

<div class="panel panel-default">
<div class="panel-heading text-center"><h3>SERVIÇOS</h3></div>
<div class="panel-body table-responsive p-0">
    <div class="input-group mb-3">
        <button type="submit" class="btn btn-nel">Imprimir</button>
    </div> 
    <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                @foreach($query_servicos as $key=>$servicos)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$servicos->id_servico}}</td>
                    <td>{{$servicos->descricao}}</td>
                    <td>{{$servicos->valor}}</td>
                    <td>
                    <a href="#" id="btn-form2" class="nav-link" style="padding: 0; margin: 0;">
                            <!--i class="fa fa-arrow-right" aria-hidden="true"></i-->
                            <span>Editar</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

