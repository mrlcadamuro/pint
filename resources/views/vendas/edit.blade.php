@extends('layouts.app')

@section('content')
<main>
    <h1>Editar Produto</h1>

    <div class="form-group">
        <label for="produto-nome">Nome do Produto:</label>
        <input type="text" id="produto-nome" name="nome" class="form-control" value="{{ $produto->nome }}" required>
    </div>

    <div class="form-group">
        <label for="produto-preco">Preço:</label>
        <input type="number" id="produto-preco" name="preco" class="form-control" value="{{ $produto->preco }}" required>
    </div>

    <div class="form-group">
        <label for="produto-estoque">Quantidade em Estoque:</label>
        <input type="number" id="produto-estoque" name="estoque" class="form-control" value="{{ $produto->estoque }}" required>
    </div>

    <div class="form-group">
        <button id="salvar-produto" class="btn btn-success">Salvar Alterações</button>
        <button id="cancelar-edicao" class="btn btn-secondary">Cancelar</button>
    </div>
</main>

<script>
    // Script para lidar com as ações de editar e cancelar
    document.getElementById('salvar-produto').addEventListener('click', function() {
        // Validação simples
        var nome = document.getElementById('produto-nome').value;
        var preco = document.getElementById('produto-preco').value;
        var estoque = document.getElementById('produto-estoque').value;

        if (!nome || !preco || !estoque) {
            alert('Por favor, preencha todos os campos.');
            return;
        }

        fetch('/vendas/{{ $venda->id_venda }}', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id_cliente: id_cliente, // Id do cliente
                id_vendedor: id_vendedor, // Id do vendedor
                data_venda: data_venda, // Data da venda
                itens: itens // Itens da venda
            })
        })

        .then(response => {
            if (response.ok) {
                alert('Produto salvo com sucesso!');
                window.location.href = '{{ route('produtos.index') }}'; // Redireciona após o sucesso
            } else {
                alert('Erro ao salvar o produto.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    });

    document.getElementById('cancelar-edicao').addEventListener('click', function() {
        if (confirm('Tem certeza de que deseja cancelar a edição?')) {
            window.location.href = '{{ route('produtos.index') }}'; // Redireciona para a lista de produtos
        }
    });
</script>
@endsection
