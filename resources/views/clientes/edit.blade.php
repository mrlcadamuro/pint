@extends('admin.index')

@section('content')
    <div class="container">
        <h2>Editar Cliente</h2>
        
        @if(session('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        
        <form action="{{ route('clientes.update', $cliente->id_cliente) }}" method="POST">
            @csrf
            @method('PUT') <!-- Método PUT para atualizar -->
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nova Senha (opcional)">
            </div>
            <div class="form-group">
                <label for="password">Confirme a senha</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme a Senha" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
