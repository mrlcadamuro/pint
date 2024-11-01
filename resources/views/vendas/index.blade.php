@extends('admin.index')

@section('content')
    <h1>Vendas</h1>
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <a href="{{ route('vendas.create') }}" class="btn btn-primary">Nova Venda</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Data da Venda</th>
                <th>Subtotal</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->id_venda }}</td>
                    <td>{{ $venda->cliente->nome }}</td>
                    <td>{{ $venda->vendedor->nome }}</td>
                    <td>{{ $venda->data_venda->format('d/m/Y') }}</td>
                    <td>
                        <ul>
                            @foreach($itens_venda as $item_venda)
                              <td>{{ $item_venda->subtotal }}</td>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('vendas.edit', $venda->id_venda) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda->id_venda) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
