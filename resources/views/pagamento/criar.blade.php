@extends('layouts.main') <!-- Extende o layout principal do seu site -->

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Criar Pagamento</h2>

    <form action="{{ route('pagamento.criar') }}" method="POST">
        @csrf <!-- Token de segurança para o formulário -->
        <div class="form-group">
            <label for="produto">Produto</label>
            <input type="text" id="produto" name="produto" class="form-control" required placeholder="Nome do produto">
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required min="1" value="1">
        </div>

        <div class="form-group">
            <label for="preco_unitario">Preço Unitário</label>
            <input type="text" id="preco_unitario" name="preco_unitario" class="form-control" required placeholder="Preço do produto">
        </div>

        <button type="submit" class="btn btn-success">Confirmar Pagamento</button>
    </form>
</div>
@endsection
