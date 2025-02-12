<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Cadastro de Usuário</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('criar.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select name="sexo" class="form-control" required>
                                    <option></option>
                                    <option  value="Masculino">Masculino</option>
                                    <option  value="Feminino">Feminino</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="dtnascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" name="dtnascimento" required>
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">Nº do Documento</label>
                                <input type="text" class="form-control" name="cpf" required>
                            </div>
                            <div class="mb-3">
                                <label for="rg" class="form-label">NIF</label>
                                <input type="text" class="form-control" name="rg" required>
                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label">Inserir Documento</label>
                                <input type="file" class="form-control" name="documento" required>
                            </div>
                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="endereco" required>
                            </div>
                            <div class="mb-3">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" name="bairro" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_cidade" class="form-label">Cidade</label>
                                <select name="id_cidade" class="form-control" required>
                                    <option value="Lubango">Lubango</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" name="telefone" required>
                            </div>

                            <div class="mb-3">
                                <label for="nivel_de_acesso" class="form-label">Tipo de conta</label>
                                <select name="nivel_de_acesso" class="form-control" required>
                                    <option value="">Tipo de Conta...</option>
                                    <option value="Cliente">Cliente</option>
                                    <option value="Tecnico">Técnico</option>
                                    <option value="Secretario">Secretário</option>
                                    <option value="Gerente">Gerente</option>
                                    <option value="Administrador">Administrador</option>
                                </select>
                            </div>

                            
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Verificar Senha</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required onkeyup="validarSenha()">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Registrar</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="{{ route('login') }}">Já tem uma conta? Faça login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function validarSenha() {
        let senha = document.getElementById("password").value;
        let confirmarSenha = document.getElementById("password_confirmation").value;
        let campoConfirmacao = document.getElementById("password_confirmation");
        let mensagemErro = document.getElementById("senhaErro");

        if (confirmarSenha === "") {
            campoConfirmacao.style.border = "1px solid #ced4da"; // Cor padrão do Bootstrap
            mensagemErro.textContent = "";
            return;
        }

        if (senha !== confirmarSenha) {
            campoConfirmacao.style.border = "2px solid red";
            mensagemErro.textContent = "As senhas não coincidem!";
        } else {
            campoConfirmacao.style.border = "2px solid green";
            mensagemErro.textContent = "";
        }
    }
</script>
</html>
