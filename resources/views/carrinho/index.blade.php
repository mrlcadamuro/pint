@extends('layouts.main')

@section('title', 'Home - PinturaCB')

@section('content')

<style>
    td, tr {
        color: white;
    }

    td > p {
        color: white;
    }

    h1 {
        color: gold;
    }

    h3 {
        color: rgb(69, 213, 69);
    }

    th, td {
        text-align: center;
    }

    img {
        height: 35px;
        width: 35px;
    }

    .total {
        margin-top: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        color: rgb(69, 213, 69);
    }
</style>

<div class="container">
    <h1>Meu Carrinho</h1>

    @if(count($itens) > 0)
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Imagem</th>
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
                        <td><p>{{ $item->produto ? $item->produto->nome_produto : 'Produto não encontrado' }}</p></td>
                        <td>
                            <!-- Formulário para atualizar a quantidade -->
                            <form action="#" method="POST" style="display: inline-flex; padding:0;">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantidade" value="{{ $item->quantidade }}" min="1" class="form-control" style="width: 70px; margin-right: 5px;">
                                <button type="submit" class="btn btn-primary">Confirmar Qtd</button>
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
                            <!-- Formulário para remover o produto -->
                            <form action="#" method="POST" style="padding:0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn btn-warning">Adicionar Produto</a>
        <a href="{{ route('pagamento.criar') }}" class="btn btn-success">Finalizar Compra</a>
        <div class="total">
            <h3>Total: R$ {{ number_format($total, 2, ',', '.') }}</h3>
        </div>
    @else
        <p>{{ $mensagem ?? 'Seu carrinho está vazio.' }}</p>
    @endif
</div>
@endsection
