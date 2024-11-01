@extends('admin.index')

@section('title', 'Lista de Vendedores')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4">Vendedores Disponíveis</h2>

    <!-- Botão para Criar um Novo Vendedor -->
    <div class="text-end mb-3">
        <a href="{{ route('vendedores.create') }}" class="btn btn-success">Criar Vendedor</a>
    </div>

    <!-- Tabela de Vendedores -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha (Criptografada)</th> <!-- Texto informativo -->
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($vendedores as $vendedor)
                <tr>
                    <td>{{ $vendedor->id_vendedor }}</td>
                    <td>{{ $vendedor->nome }}</td>
                    <td>{{ $vendedor->email }}</td>
                    <td>********</td> <!-- Exibir texto genérico, não a senha real -->
                    <td>
                        <a href="{{ route('vendedores.edit', $vendedor->id_vendedor) }}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('vendedores.destroy', $vendedor->id_vendedor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este vendedor?');">
                                <i class="fas fa-trash-alt"></i> 
                            </button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($vendedores->isEmpty())
        <div class="alert alert-info text-center">Nenhum vendedor encontrado.</div>
    @endif
</div>

@endsection
