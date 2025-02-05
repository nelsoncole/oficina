<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoTech Solutions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">AutoTech Solutions</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signup') }}">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h2 class="text-center">Bem-vindo à AutoTech Solutions</h2>
        <p class="text-center">Oferecemos serviços automotivos de alta qualidade com tecnologia de ponta.</p>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('oficina/oficina1.png') }}" class="d-block w-100" alt="Imagem 1" style="max-height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('oficina/oficina2.jpg') }}" class="d-block w-100" alt="Imagem 2" style="max-height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('oficina/oficina3.jpg') }}" class="d-block w-100" alt="Imagem 3" style="max-height: 300px; object-fit: cover;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
        
        <div class="mt-5">
            <h3 class="text-center">Nossos Serviços</h3>
            <ul>
                <li><strong>Manutenção preventiva</strong> para evitar problemas futuros.</li>
                <li><strong>Diagnóstico computadorizado</strong> para identificar falhas rapidamente.</li>
                <li><strong>Reparos mecânicos</strong> com peças de qualidade.</li>
                <li><strong>Atendimento personalizado</strong> e suporte completo.</li>
            </ul>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
