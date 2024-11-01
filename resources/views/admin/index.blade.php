<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title> <!-- Permite customizar o título -->
    <!-- Link do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link para o seu CSS personalizado -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <div class="container-fluid">
        <header class="d-flex justify-content-between align-items-center p-3">
            <h1>@yield('header-title', 'Admin Dashboard')</h1>
            <div>
                <a href="{{ url('/home') }}" class="btn btn-custom">Sair</a>
            </div>
        </header>

        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h4 class="text-light">Menu</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/produtos/exibir">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vendedores/index">Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/clientes/index">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vendas/index">Vendas</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Conteúdo Principal -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @if(session('msg'))
                    <p class="alert alert-success">{{ session('msg') }}</p>
                @endif
                @yield('content') 
            </main>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
