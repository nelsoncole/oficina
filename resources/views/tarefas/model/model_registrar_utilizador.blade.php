<div class="modal fade" id="model_registrar_utilizador" tabindex="-1" aria-labelledby="meuModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">  <!-- Adicionando modal-dialog-centered -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="meuModalLabel">Registrar Utilizador</h5>
            </div>
            <div class="modal-body">
                <!-- Conteúdo do modal centralizado... -->
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text sp-nel-3 border-nel-3">Tipo de Utilizador</span>
                    </div>
                    <select id="selecionar-form" class="form-control border-nel-3" onchange="mostrar_form()">
                        <option value="">Selecione...</option>
                        <option value="op1">Funcionário</option>
                        <option value="op2">Cliente</option>
                    </select>
                </div>
                

                <!-- Formulário 1 - Funcionário -->
                <div id="form1" style="display: none;">
                    <form method='POST' action="{{ route('funcionario.registrar') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 80px;">Nome</span>
                            </div>
                            <input type="text" name="nome" class="form-control border-nel-2" placeholder="Nome do Funcionário" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 80px;">CPF</span>
                            </div>
                            <input type="text" name="cpf" class="form-control border-nel-2" placeholder="Nº de Identidade" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 80px;">Telefone</span>
                            </div>
                            <input type="text" name="telefone" class="form-control border-nel-2" placeholder="Nº de Telefone" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 80px;">Função</span>
                            </div>
                            <select name="funcao" class="form-control border-nel-2" required>
                                <option></option>
                                <option>Secretário</option>
                                <option>Técnico</option>
                                <option>Gerente</option>
                                <option>Administrador</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text sp-nel border-nel-2" style="width: 160px;">Data de Nascimento</span>
                            </div>
                            <input type="date" name="data_nascimento" class="form-control border-nel-2" placeholder="Data de Nascimento" required>
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