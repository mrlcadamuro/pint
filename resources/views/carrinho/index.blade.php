@extends('layouts.main')

@section('title', 'Home - PinturaCB')

@section('content')
<div class="container">
    <h1>Meu Carrinho</h1>

    @if(count($itens) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($itens as $item)
                    <tr>
                        <td>{{ $item->produto ? $item->produto->nome_produto : 'Produto não encontrado' }}</td>
                        <td>
                            <!-- Campo de quantidade que atualiza diretamente -->
                            <form action="/atualizar-quantidade/{{ $item->id }}" method="POST" style="display: inline-flex;">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantidade" value="{{ $item->quantidade }}" min="1" class="form-control" style="width: 70px;" onchange="this.form.submit()">
                            </form>
                        </td>
                        <td>R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                        <td>
                            @php
                                $subtotal = $item->preco_unitario * $item->quantidade;
                                $total += $subtotal;
                            @endphp
                            R$ {{ number_format($subtotal, 2, ',', '.') }}
                        </td>
                        <td>
                            <!-- Formulário para remoção do item -->
                            <form action="/remover-item/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/produto" class="btn btn-warning">Adicionar Produto</a>
        <a href="/pagamento" class="btn btn-success">Finalizar Compra</a>
        <form action="/limpar-carrinho" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Limpar Carrinho</button>
        </form>
        <div class="total">
            <h3>Total: R$ {{ number_format($total, 2, ',', '.') }}</h3>
        </div>
    @else
        <p>{{ $mensagem ?? 'Seu carrinho está vazio.' }}</p>
    @endif
</div>
@endsection
