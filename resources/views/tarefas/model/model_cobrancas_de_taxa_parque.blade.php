<div class="modal fade" id="model_cobrancas_de_taxa_parque" tabindex="-1" aria-labelledby="meuModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">  <!-- Adicionando modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">COBRANÇAS DE SERVIÇOS E TAXAS</h5>
            </div>
            <div class="modal-body">
                <!-- Conteúdo do modal centralizado... -->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">Taxa de Parque</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="taxa_cobrancas" value="1500" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">Seguro de Parque</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="seguro_cobrancas" value="3000" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">Sub Total</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="st_cobrancas" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">Total</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="t_cobrancas" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">Total Geral</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="tg_cobrancas" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">20% do Valor de Serviço</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="servico_cobrancas" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel border-nel-2" style="width: 200px;">Valor a Pagar</span>
                    </div>
                    <input type="text" name="" class="form-control border-nel-2" id="por_pagar_cobrancas" style="text-align: center; font-weight: bold;" readonly>
                </div>

                <div class="input-group mb-3" style="width: 100%; display: flex; justify-content: flex-end;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    &nbsp;
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ModelCobrancasTaxa (){
        document.getElementById("servico_cobrancas").value =
        parseFloat(document.getElementById("st_cobrancas").value)*0.20;

        document.getElementById("t_cobrancas").value =
        parseFloat(document.getElementById("st_cobrancas").value) +
        parseFloat(document.getElementById("servico_cobrancas").value);

        document.getElementById("tg_cobrancas").value =
        parseFloat(document.getElementById("taxa_cobrancas").value) +
        parseFloat(document.getElementById("seguro_cobrancas").value) +
        parseFloat(document.getElementById("t_cobrancas").value);

        document.getElementById("por_pagar_cobrancas").value =
        parseFloat(document.getElementById("servico_cobrancas").value)+ 
        parseFloat(document.getElementById("taxa_cobrancas").value)+ 
        parseFloat(document.getElementById("seguro_cobrancas").value)+ 
        " AKZ";

    }
</script>