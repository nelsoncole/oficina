@extends('layouts.app')

@section('title', 'Home')
@section('header', 'Bem-vindo ao AdminLTE com Laravel')

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE Laravel</span>
    </a>
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard 1</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

@section('content')
    <div class="card">
        <div class="card-header">Exemplo</div>
        <div class="card-body">
            <p>Conteúdo do dashboard aqui.</p>
        </div>
    </div>
@endsection