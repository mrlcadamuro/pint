<!-- CSS da Aplicação -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="/css/registro.css">
<script src="/js/registro.js"></script>

<!-- Fonte da letra -->
<link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center bg-light">
    <!-- Seção de boas-vindas com texto (Esquerda) -->
    <div class="left-section d-flex align-items-center justify-content-center text-center p-5">
        <div>
            <h1 class="display-4 mb-4">Bem-vindo ao registro Administrador!</h1>
            <p class="lead mb-3">Junte-se a nós para gerenciar tudo!</p>
            <p class="info-text">É rápido, fácil e seguro.</p>
        </div>
    </div>

    <!-- Linha divisória com texto centralizado -->
    <div class="divider-with-text">
       
    </div>

    <div class="right-section d-flex align-items-center justify-content-center">
        <form method="POST" action="{{ route('auth.register') }}" class="login-form p-4 rounded shadow">
            @csrf
            <h2 class="text-center">Cadastro</h2>
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
                <input type="text" name="name" class="form-control" placeholder="Nome" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Senha" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme a Senha" required>
            </div>
            <div class="text-center mt-3">
                <p>Já tem uma conta? <a href="{{ route('auth.login') }}">Login</a></p>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
    </div>

</div>
