@extends('admin.index')

@section('title', 'Lista de Produtos')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4">Produtos</h2>
    <div class="text-end mb-3">
        <a href="{{ route('produtos.create') }}" class="btn btn-success">Adicionar Novo Produto</a>
    </div>

 
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade em Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->estoque }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->id_produto) }}" class="btn btn-warning me-2">
                            <i class="fas fa-pencil-alt"></i> 
                        </a>
                        <form action="{{ route('produtos.destroy', $produto->id_produto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                                <i class="fas fa-trash-alt"></i> 
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
