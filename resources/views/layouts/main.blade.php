<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Bootstrap e ícones -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <!-- Cabeçalho da Página -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.png" alt="Logo" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/produtos/index">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" href="/servicos">Serviços</a></li>
                        <li class="nav-item"><a class="nav-link" href="/sobre">Sobre Nós</a></li>
                        <li class="nav-item"><a class="nav-link" href="/carrinho/index">Carrinho</a></li>
                    </ul>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.login') }}"><i class="bi bi-person icon-login"></i></a>
                    </li>
                </div>
            </div>
        </nav>

        <main class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="alert alert-info">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </main>

        <!-- Rodapé -->
        <footer class="text-center py-4">
            <div class="container">
                <p>© 2024 Cadamuro Pintura. Todos os direitos reservados.</p>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none">Política de Privacidade</a></li>
                    <li><a href="#" class="text-decoration-none">Termos de Serviço</a></li>
                </ul>
            </div>
        </footer>

        <!-- Scripts Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
