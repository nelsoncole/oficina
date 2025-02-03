@extends('layouts.app')

@section('title', 'Secretaria')
@section('header', 'Bem-vindo a Secretaria')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div style="text-align: center; text-">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">
                <b>Oficina</b>
            </span>
        </a>
    </div>
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="#" id="btn-form1" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Registrar Viatura</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" id="btn-form2" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Relatório Viatura</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" id="btn-form3" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Registro de Taxas</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="#" id="btn-form4" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Utilizadores</p>
                    </a>
                </li>
            </ul>
            
        </nav>
    </div>
</aside>
@section('content')
    <div class="card">
        <div class="card-header"><p>Secretaria</p></div>
        <div class="card-body">
            <!-- Contêiner dos formulários -->
            <div id="form-container">
                <div id="form_registrar_viatura" class="formulario">
                    @include('tarefas.registrar_viatura')
                </div>
                <div id="form_estado_viatura" class="formulario" style="display:none;">
                    @include('tarefas.estado_viatura')
                </div>
                <div id="form_registro_utilizadores" class="formulario" style="display:none;">
                    @include('tarefas.registro_utilizadores')
                </div>
            </div>           
        </div>
    </div>
    <!-- Script para alternar os formulários -->
    <script>
        document.getElementById('btn-form1').addEventListener('click', function() {
            // Exibe o formulário 1 e oculta o formulário 2
            document.getElementById('form_registrar_viatura').style.display = 'block';
            document.getElementById('form_estado_viatura').style.display = 'none';
            document.getElementById('form_registro_utilizadores').style.display = 'none';
        });
        document.getElementById('btn-form2').addEventListener('click', function() {
            // Exibe o formulário 2 e oculta o formulário 1
            
            document.getElementById('form_registrar_viatura').style.display = 'none';
            document.getElementById('form_estado_viatura').style.display = 'block';
            document.getElementById('form_registro_utilizadores').style.display = 'none';
        });
        document.getElementById('btn-form4').addEventListener('click', function() {
            // Exibe o formulário 2 e oculta o formulário 1
            
            document.getElementById('form_registrar_viatura').style.display = 'none';
            document.getElementById('form_estado_viatura').style.display = 'none';
            document.getElementById('form_registro_utilizadores').style.display = 'block';
        });
    </script>
@endsection