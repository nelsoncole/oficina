<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Botão de Minimizar/Expandir o Sidebar -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Botão Sair-->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="nav-link">
                @php
                    $nome = Auth::user()->name;
                @endphp
                <p style="color:rgb(25, 14, 128);">{{$nome}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                Sair
            </a>
        </li>
    </ul>
</nav>