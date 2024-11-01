@extends('layouts.main')

@section('title', 'Home - PinturaCB')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    <!-- Seção Hero -->
    <div class="hero-section">
        <div class="overlay">
            <div class="content text-center">
                <h1 class="display-4">Transforme seus Ambientes</h1>
                <p class="lead">Pintores especializados e os melhores produtos de pintura</p>
                <a href="/servicos" class="btn btn-outline-light btn-lg">Contratar Serviços</a>
            </div>
        </div>
    </div>

    <!-- Seção de Apresentação -->
    <section id="apresentacao" class="py-5 text-center">
        <div class="container">
            <h2 class="mb-4">Bem-vindo à PinturaCB</h2>
            <p class="lead">Na PinturaCB, somos dedicados a oferecer o melhor em serviços de pintura e produtos de alta qualidade. Nossa equipe de pintores especializados está pronta para transformar qualquer espaço, trazendo cor e vida aos seus ambientes. Explore nossas soluções e descubra como podemos ajudar você a criar o ambiente dos seus sonhos!</p>
        </div>
    </section>
    <section id="texturas-e-pinturas" class="py-5">
        <div class="container text-center">
            <h2 class="mb-5">Nossos Produtos</h2>
            <div class="text-container">
                <p>Oferecemos uma ampla gama de produtos de pintura de alta qualidade, incluindo tintas acrílicas, texturas decorativas e opções ecológicas. Nossos produtos garantem durabilidade e um acabamento impecável para transformar qualquer ambiente.</p>
            </div>
        </div>
    </section>


    

    <script src="{{ asset('js/home.js') }}"></script>
@endsection
