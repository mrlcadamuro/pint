@extends('layouts.main')

@section('title', 'Sobre Nós - Sua Empresa de Pintura')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/sobre.css') }}">
    
    <div class="container py-5">
        <div class="header text-center">
            <h1>Sobre Nós</h1>
        </div>

        <div class="description text-center mb-4">
            <p>Nossa empresa é especializada em serviços de pintura com qualidade e excelência. Contamos com uma equipe de profissionais dedicados e produtos de alta qualidade para atender suas necessidades.</p>
        </div>

        <div class="row">
            <div class="service col-md-6">
                <h2>Nossos Serviços</h2>
                <div class="service-item">
                    <div class="service-name">Pintura Residencial</div>
                </div>
                <div class="service-item">
                    <div class="service-name">Pintura Comercial</div>
                </div>
                <div class="service-item">
                    <div class="service-name">Verniz e Textura</div>
                </div>
                <div class="service-item">
                    <div class="service-name">Venda de Produtos de Pintura</div>
                </div>
            </div>

            <div class="mission-vision col-md-6">
                <div class="mission">
                    <h2>Missão</h2>
                    <p>Oferecer serviços de pintura com o melhor custo-benefício, priorizando a satisfação do cliente.</p>
                </div>

                <div class="vision">
                    <h2>Visão</h2>
                    <p>Ser reconhecida como a melhor empresa de pintura da região, sempre inovando e melhorando nossos serviços.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-spacer"></div> <!-- Espaçador para garantir que o rodapé não seja afetado -->
@endsection
