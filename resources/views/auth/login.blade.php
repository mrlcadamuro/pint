<!-- CSS da Aplicação 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/css/login.css">
<script src="/js/login.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

<div class="container-fluid vh-100 d-flex align-items-center bg-light">
    <div class="left-section d-flex align-items-center justify-content-center">
        <div class="welcome-info text-center p-5">
            <h1 class="welcome-title display-4 mb-4">Bem-vindo ao Painel do Administrador!</h1>
            <p class="lead mb-3">Gerencie os produtos, pedidos e serviços do site de pintura com eficiência.</p>
            <p class="info-text">Acesse com suas credenciais para monitorar e ajustar o desempenho do sistema.</p>
        </div>
    </div>
    <div class="divider"></div>
        <div class="right-section d-flex align-items-center justify-content-center">
        <form method="POST" action="{{ route('auth.login') }}" class="login-form p-4 rounded shadow">
            @csrf
            <h2 class="text-center mb-4">Login Administrador</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <div class="text-center mt-3">
                <p>Não tem uma conta? <a href="{{ route('auth.register') }}">Registrar</a></p>
            </div>
        </form>
    </div>
</div>-->
<form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Nome" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>