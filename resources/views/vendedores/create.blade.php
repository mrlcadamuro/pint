@extends('admin.index')

@section('title', 'Adicionar Novo Vendedor')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Adicionar Novo Vendedor</h2>

    @if(session('msg'))
        <p class="alert alert-success">{{ session('msg') }}</p>
    @endif

    <form action="{{ route('vendedores.store') }}" method="POST" enctype="multipart/form-data">
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

        <button type="submit" class="btn btn-primary">Cadastrar Vendedor</button>
    </form>
</div>
@endsection
