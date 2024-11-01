@extends('layouts.main')

@section('title', 'PinturaCB')

@section('content')

@if($produtos->isEmpty())
    <p class="text-center">Nenhum produto encontrado.</p>
@else
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
    <script src="{{ asset('js/produto.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Importar Font Awesome -->

    <div id="search-background">
        <div id="search-container" class="col-md-12 text-center mb-4">
            <h2>BUSQUE AQUI</h2>
            <form action="/produtos/index" method="GET">
                <input type="text" id="search" name="search" class="form-control w-50 mx-auto" placeholder="Procurar...">
            </form>
        </div>
    </div>

    <div id="produtos-container" class="col-md-12">
        <h2 class="text-center">Produtos</h2>
        <p class="text-center">Esses são os nossos produtos</p>
        <div class="row justify-content-center">
            @foreach($produtos as $produto)
                <div class="card col-md-3 col-sm-6 m-2"> <!-- Mantém 4 produtos por linha -->
                    <img src="/img/produtos/{{ $produto->image }}" alt="Imagem do Produto" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ Str::limit($produto->nome, 10, '...') }}</h5>
                        <p class="card-descripicion">{{ Str::limit($produto->descricao, 20, '...') }}</p>
                        <h3 class="card-value text-end">R$ {{ number_format($produto->preco, 2, ',', '.') }}</h3>
                        <div class="d-flex justify-content-center mt-2">
                            <a href="{{ route('produtos.show', $produto->id_produto) }}" class="btn btn-primary btn-block me-2">Comprar</a>
                            <button class="btn btn-secondary btn-block">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endif

@endsection
