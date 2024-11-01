@extends('admin.index')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<h1>Nova Venda</h1>

<form action="{{ route('vendas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="id_cliente">Cliente:</label>
        <select name="id_cliente" id="id_cliente" class="form-control">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_vendedor">Vendedor:</label>
        <select name="id_vendedor" id="id_vendedor" class="form-control">
            @foreach($vendedores as $vendedor)
                <option value="{{ $vendedor->id_vendedor }}">{{ $vendedor->nome }}</option>
            @endforeach
        </select>
    </div>

    <div id="produtos">
        <div class="produto-item">
            <h3>Produto:</h3>
            <select name="itens[0][id_produto]" class="form-control produto-select">
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id_produto }}" data-preco="{{ $produto->preco }}" data-estoque="{{ $produto->estoque }}">{{ $produto->nome }}</option>
                @endforeach
            </select>

            <div class="quantidade-controls">
                <button type="button" class="btn btn-secondary btn-quantidade" data-valor="-1">-</button>
                <input type="number" name="itens[0][quantidade]" class="quantidade-input" value="1" min="1" style="width: 50px; text-align: center;">
                <button type="button" class="btn btn-secondary btn-quantidade" data-valor="+1">+</button>
            </div>

            <div class="data-venda">
                <label for="data_venda">Data da Venda:</label>
                <input type="date" name="data_venda" id="data_venda" class="form-control" required>
            </div>

            <h3>Preço Unitário:</h3>
            <span class="preco-unitario"></span>
            <button type="button" class="remove-produto btn btn-danger" title="Remover Produto">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>

    <div class="actions-container">
        <button type="button" id="add-produto" class="btn btn-primary">
            <i class="fas fa-plus"></i> Adicionar Produto
        </button>
        <div class="subtotal-container">
            <h3>Subtotal: R$ <span id="subtotal">0.00</span></h3>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar Venda</button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const produtosContainer = document.getElementById("produtos");
        const subtotalElement = document.getElementById("subtotal");

        document.getElementById("add-produto").addEventListener("click", function () {
            const newProdutoItem = produtosContainer.querySelector(".produto-item").cloneNode(true);
            produtosContainer.appendChild(newProdutoItem);
            updateSubtotal();
        });

        produtosContainer.addEventListener("click", function (event) {
            if (event.target.classList.contains("btn-quantidade")) {
                const quantityInput = event.target.closest(".quantidade-controls").querySelector(".quantidade-input");
                const change = parseInt(event.target.getAttribute("data-valor"));
                let newValue = parseInt(quantityInput.value) + change;
                newValue = Math.max(1, newValue);
                quantityInput.value = newValue;
                updateSubtotal();
            } else if (event.target.classList.contains("remove-produto")) {
                event.target.closest(".produto-item").remove();
                updateSubtotal();
            }
        });

        function updateSubtotal() {
            let subtotal = 0;
            produtosContainer.querySelectorAll(".produto-item").forEach(function (item) {
                const preco = parseFloat(item.querySelector(".produto-select").selectedOptions[0].dataset.preco);
                const quantidade = parseInt(item.querySelector(".quantidade-input").value);
                subtotal += preco * quantidade;
            });
            subtotalElement.textContent = subtotal.toFixed(2);
        }
    });
</script>
@endsection
