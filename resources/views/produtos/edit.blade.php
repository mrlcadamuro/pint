@extends('admin.index')

@section('content')
    <div class="container">
        <h2>Editar Produto</h2>
        
        @if(session('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif
        
        <form action="{{ route('produtos.update', $produto->id_produto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" required>{{ $produto->descricao }}</textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" value="{{ $produto->preco }}" required>
            </div>

            <div class="form-group">
                <label for="estoque">Quantidade em Estoque</label>
                <input type="number" class="form-control" id="estoque" name="estoque" value="{{ $produto->estoque }}" required>
            </div>

            <div class="form-group">
                <label for="image">Imagem do Produto</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if($produto->image)
                    <p>Imagem atual:</p>
                    <img src="{{ asset('img/produtos/' . $produto->image) }}" alt="Imagem do Produto" style="width: 150px; height: auto;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
