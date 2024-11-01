@extends('admin.index')

@section('title', 'Criar Pintura')

@section('content')

    <div id="produto-create-container" class="col-md-6 offset-md-3">
        <h1>Crie um produto</h1>
        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="form-group">
                <label for="estoque">Estoque</label>
                <input type="number" class="form-control" id="estoque" name="estoque" required>
            </div>
            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Produto</button>
        </form>

    </div>

@endsection


