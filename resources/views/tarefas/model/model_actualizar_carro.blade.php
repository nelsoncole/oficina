<div class="modal fade" id="model_actualizar_carro" tabindex="-1" aria-labelledby="meuModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">  <!-- Adicionando modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Monitorar Viatura</h5>
            </div>
            <div class="modal-body">
                <!-- Conteúdo do modal centralizado... -->
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel-3 border-nel-3">Acção</span>
                    </div>
                    <select id="selecionar-form" class="form-control border-nel-3" onchange="mostrar_form()">
                        <option value="">Selecione...</option>
                        <option value="op1">Estado</option>
                        <option value="op2">Indicar Técnico</option>
                    </select>
                </div>

                <!-- Formulário 1 - Funcionário -->
                <div id="form1" style="display: none;">
                    <form method='POST' action="{{ route('carro.updateEstado') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 80px;">CodeID</span>
                            </div>
                            <input type="text" name="codigo" id="id_model_codeID" class="form-control border-nel-2" value="" readonly required>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 80px;">Função</span>
                            </div>
                            <select name="estado" class="form-control border-nel-2" required>
                                <option></option>
                                @foreach($enum_carro_estado as $value)
                                    <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="input-group mb-3" style="width: 100%; display: flex; justify-content: flex-end;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            &nbsp;
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>

                    </form>
                </div>

                <!-- Formulário 2 -->
                <div id="form2" style="display: none;">
                    <form>
                        <p>Indisponível, pode criar a nova aconta na página inicial</p>
                        <div class="input-group mb-3" style="width: 100%; display: flex; justify-content: flex-end;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function mostrar_form() {
        var opcaoSelecionada = document.getElementById("selecionar-form").value;
        // Oculta todos os formulários
        document.getElementById("form1").style.display = "none";
        document.getElementById("form2").style.display = "none";

        // Exibe o formulário correspondente à seleção
        if (opcaoSelecionada === "op1") {
            document.getElementById("form1").style.display = "block";
        } else if (opcaoSelecionada === "op2") {
            document.getElementById("form2").style.display = "block";
        }
    }
</script>