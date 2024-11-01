@extends('admin.index')

@section('title', 'Editar Vendedor')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Editar Vendedor</h2>

    @if(session('msg'))
        <p class="alert alert-success">{{ session('msg') }}</p>
    @endif

    <form action="{{ route('vendedores.update', $vendedor->id_vendedor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $vendedor->nome }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $vendedor->email }}" required>
        </div>

        <div class="form-group">
            <label for="senha">Nova Senha (deixe em branco se não quiser alterar)</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a nova senha">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Vendedor</button>
    </form>
</div>
@endsection
