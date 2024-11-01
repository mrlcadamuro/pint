@extends('admin.index')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Lista de Clientes</h2>

    @if(session('msg'))
        <p class="alert alert-success">{{ session('msg') }}</p>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha (Criptografada)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>********</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?');">
                            <i class="fas fa-trash-alt"></i> 
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('clientes.create') }}" class="btn btn-success">Adicionar Novo Cliente</a>
</div>
@endsection
