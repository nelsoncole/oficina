<?php
// Formulário cadastrar
$tuplaJSON = json_encode($query_servicos);
?>

<div class="text-center"><h3>REGISTRO DE CARROS</h3></div>

<form method='POST' action="{{ route('carro.registrar') }}">
    @csrf

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text sp-nel border-nel-2">ID do Cliente</span>
        </div>
        <input type="text" name="id_cliente" class="form-control border-nel-2" placeholder="ID Cliente" required>
    </div>
    
    <div class="d-flex gap-2"> 
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text sp-nel border-nel-2">Marca</span>
            </div>
            <select name="marca" class="form-control border-nel-2">
                <option value=""></option>
                @foreach($enum_marca as $value)
                    <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div>

        &nbsp;
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text sp-nel border-nel-2">Tipo</span>
            </div>
            <select  name="tipo" class="form-control border-nel-2">
                <option  value=""></option>
                @foreach($enum_tipo as $value)
                <option  value="{{ $value }}">{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div >
        
        &nbsp;
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text sp-nel border-nel-2">Cor</span>
            </div>
            <select  name="cor" class="form-control border-nel-2">
                <option  value=""></option>
                @foreach($enum_cor as $value)
                <option  value="{{ $value }}">{{ ucfirst($value) }}</option>
                @endforeach
            </select>
        </div>

    </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text sp-nel border-nel-2">Modelo</span>
            </div>
            <input type="text" name="modelo" class="form-control border-nel-2" placeholder="Modelo da viatura" required>
        </div>

        <div class="d-flex gap-2"> 
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text sp-nel border-nel-2">Placa</span>
                </div>
                <input type="text" name="placa" class="form-control border-nel-2" placeholder="Placa" required>
            </div>

            &nbsp;
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text sp-nel border-nel-2">Fabricação</span>
                </div>
                <input type="text" name="fabricacao" class="form-control border-nel-2" placeholder="Fabricação" required>
            </div>

            &nbsp;
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text sp-nel border-nel-2">Ano</span>
                  </div>
                  <select name="ano" class="form-control border-nel-2">
                        <option></option>
                        <option  value="2024">2025</option>
                        <option  value="2024">2024</option>
                        <option  value="2023">2023</option>
                        <option  value="2022">2022</option>
                        <option  value="2021">2021</option>
                        <option  value="2020">2020</option>
                        <option  value="2019">2019</option>
                        <option  value="2018">2018</option>
                        <option  value="2023">2017</option>
                        <option  value="2022">2016</option>
                        <option  value="2021">2015</option>
                        <option  value="2020">2014</option>
                        <option  value="2019">2013</option>
                        <option  value="2018">2012</option>
                        <option  value="2020">2011</option>
                        <option  value="2019">2010</option>
                        <option  value="2018">2009</option>
                        <option  value="2018">2008</option>
                        <option  value="2018">2007</option>
                        <option  value="2018">2006</option>
                        <option  value="2018">2005</option>
                        <option  value="2018">2004</option>
                        <option  value="2018">2003</option>
                        <option  value="2018">2002</option>
                        <option  value="2018">2001</option>
                        <option  value="2018">2000</option>
                        <option  value="2018">1999</option>
                        <option  value="2018">1998</option>
                        <option  value="2018">1997</option>
                        <option  value="2018">1996</option>
                        <option  value="2018">1995</option>
                        <option  value="2018">1994</option>
                        <option  value="2018">1993</option>
                        <option  value="2018">1992</option>
                        <option  value="2018">1991</option>
                        <option  value="2018">1990</option>
                        <option  value="2018">1989</option>
                        <option  value="2018">1988</option>
                        <option  value="2018">1987</option>
                        <option  value="2018">1986</option>
                        <option  value="2018">1985</option>
                        <option  value="2018">1984</option>
                        <option  value="2018">1983</option>
                        <option  value="2018">1982</option>
                        <option  value="2018">1981</option>
                        <option  value="2018">1980</option>
                    </select>
            </div>    
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text sp-nel border-nel-2">Tipo de Avaria</span>
            </div>
            
            <input type="text" name="tipo_de_avaria" style="width: 70%;" id="id_tipo_avaria" class="form-control border-nel-2" placeholder="Tipo de Avaria" readonly required>
            
            <select class="form-control border-nel-2" id="id_avaria" style="width: 10%;">
                <option value="">Avaria...</option>
                @foreach($query_servicos as $value)
                <option  value="{{ $value->descricao }}">{{ ucfirst($value->descricao) }}</option>
                @endforeach
            </select>
        </div>

        @include('tarefas.model.model_cobrancas_de_taxa_parque')
        <div class="input-group mb-3">
            <button type="button" onclick="ModelCobrancasTaxa()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#model_cobrancas_de_taxa_parque">Registrar</button>
            &nbsp;
            <button type="button" onclick="Limpar()" class="btn btn-nel">Limpar</button>
        </div>
   
</form>

<script>
    var servicos = <?php echo $tuplaJSON;  ?>; 
    var quantidade = 0;
    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById("id_avaria").addEventListener("change", function(){
            if(this.value){
                quantidade += servicos[this.selectedIndex-1].valor;
            
                document.getElementById("st_cobrancas").value = parseFloat(quantidade);
                document.getElementById("id_tipo_avaria").value += this.value + "; ";
            }
        });
    });

    function Limpar(){
        quantidade = 0;
        document.getElementById("st_cobrancas").value = parseFloat(quantidade);
        document.getElementById("id_tipo_avaria").value = "";
    }
</script>


