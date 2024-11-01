@extends('layouts.main') <!-- Use o layout principal do seu site -->

@section('content')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
<script src="{{ asset('js/show.js') }}"></script>
<div class="container mt-5">
    <h2 class="text-center">{{ $produto->nome }}</h2> <!-- Nome do Produto -->
    
    <div class="row">
        <div class="col-md-6">
            <!-- Exibe a imagem do produto, caso exista -->
            @if($produto->image)
                <div class="produto-imagem">
                    <img src="{{ asset('img/produtos/' . $produto->image) }}" alt="{{ $produto->nome }}" class="img-fluid rounded shadow">
                </div>
            @else
                <p>Imagem não disponível</p>
            @endif
        </div>
        <form action="{{ route('produtos.adicionar', ['id' => $produto->id_produto]) }}" method="POST">
    @csrf
    <div class="col-md-6">
        <div class="produto-detalhes">
            <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p><strong>Quantidade em Estoque:</strong> {{ $produto->estoque }}</p>
            
            <button type="submit" class="btn btn-primary">Adicionar no Carrinho</button>
        </div>
    </div>
</form>

    </div>

</div>
@endsection
