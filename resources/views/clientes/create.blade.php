@extends('admin.index')

@section('content')
    <div class="container">
        <h2>Criar Cliente</h2>
        
        @if(session('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
        </form>

    </div>
@endsection
