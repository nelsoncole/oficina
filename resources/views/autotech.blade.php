@extends('layouts.app')

@section('title', 'Oficina')
@section('header', 'Bem-vindo à AutoTech Solutions')

@php
    $cargo = "Indefinido";
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div style="text-align: center; text-">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">
                <b>Oficina</b>
            </span>
        </a>
    </div>
    <div class="sidebar">
        @if (Auth::check())
            @php
                $tipoUsuario = Auth::user()->nivel_de_acesso;

                $navbars = [
                    'Administrador' => 'layouts.partials.navbar_admin',
                    'Secretario' => 'layouts.partials.navbar_secretaria',
                    'Gerente' => 'layouts.partials.navbar_gerente',
                    'Tecnico' => 'layouts.partials.navbar_tecnico',
                    'Cliente' => 'layouts.partials.navbar_cliente',
                ];
                $cargos = [
                    'Administrador' => 'Administrador',
                    'Secretario' => 'Secretário',
                    'Gerente' => 'Gerente',
                    'Tecnico' => 'Técnico',
                    'Cliente' => 'Cliente',
                ];

                $navbar = $navbars[$tipoUsuario] ?? null;
                $cargo = $cargos[$tipoUsuario] ?? 'Desconhecido';
            @endphp

            @if ($navbar)
                @include($navbar)
            @endif
        @endif
    </div>
</aside>
@section('content')
    <div class="card">
        <div class="card-header"><p>{{ $cargo }}</p></div>
        <div class="card-body">
            <!-- Contêiner dos formulários -->
            <div id="form-container">
                <div id="form_registrar_viatura" class="formulario" style="display:none;">
                    @include('tarefas.registrar_viatura')
                </div>
                <div id="form_estado_viatura" class="formulario" style="display:none;">
                    @include('tarefas.estado_viatura')
                </div>
                <div id="form_registrar_servicos" class="formulario" style="display:none;">
                    @include('tarefas.registrar_servicos')
                </div>
                <div id="form_registrar_utilizador" class="formulario" style="display:none;">
                    @include('tarefas.registrar_utilizador')
                </div>

                <div id="form_estado_viatura_cliente" class="formulario" style="display:none;">
                    @include('tarefas.estado_viatura_cliente')
                </div>
            </div>           
        </div>
    </div>
    <!-- Script para alternar os formulários -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function mostrarFormulario(id) {
                // Ocultar todos os formulários
                document.querySelectorAll(".formulario").forEach(form => form.style.display = "none");

                // Exibir apenas o formulário desejado
                const form = document.getElementById(id);
                if (form) {
                    form.style.display = "block";
                    // Salvar no localStorage
                    localStorage.setItem("ultimoFormularioAberto", id);
                }
            }

            // Mapear botões para seus respectivos formulários
            const botoes = {
                "btn-form1": "form_registrar_viatura",
                "btn-form2": "form_estado_viatura",
                "btn-form3": "form_registrar_servicos",
                "btn-form6": "form_registrar_utilizador",
                "btn-form1_cliente": "form_estado_viatura_cliente"
            };

            // Adicionar eventos aos botões dinamicamente
            Object.keys(botoes).forEach(botaoId => {
                const botao = document.getElementById(botaoId);
                if (botao) {
                    botao.addEventListener("click", () => mostrarFormulario(botoes[botaoId]));
                }
            });

            // Verificar se há um formulário salvo no localStorage
            const ultimoFormulario = localStorage.getItem("ultimoFormularioAberto");
            if (ultimoFormulario) {
                mostrarFormulario(ultimoFormulario);
            }
        });
    </script>
@endsection