@extends('layouts.main') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/servico.css') }}">

<div class="container">
    <h1 class="text-center mt-5">Nossos Serviços</h1>

    <div class="row servicos">
        <div class="col-md-4 servico">
            <h2>Pintura Residencial</h2>
            <p>Transforme sua casa com nossas pinturas de alta qualidade. Oferecemos serviços de pintura interna e externa, garantindo um acabamento perfeito e duradouro.</p>
        </div>

        <div class="col-md-4 servico">
            <h2>Pintura Comercial</h2>
            <p>Renove seu ambiente comercial com nossas soluções de pintura. Trabalhamos em escritórios, lojas e outros espaços comerciais, sempre respeitando prazos e orçamentos.</p>
        </div>

        <div class="col-md-4 servico">
            <h2>Pintura de Muros e Cercas</h2>
            <p>Proteja e embeleze seus muros e cercas com nossa pintura especializada. Utilizamos produtos de alta resistência para garantir a durabilidade.</p>
        </div>

        <div class="col-md-4 servico">
            <h2>Pintura de Portões</h2>
            <p>Oferecemos serviços de pintura para portões, garantindo que eles fiquem visualmente atraentes e protegidos contra as intempéries.</p>
        </div>

        <div class="col-md-4 servico">
            <h2>Texturas e Acabamentos</h2>
            <p>Adicione um toque especial aos seus ambientes com texturas e acabamentos diferenciados. Nossos especialistas estão prontos para ajudar na escolha do melhor estilo.</p>
        </div>

        <div class="col-md-4 servico">
            <h2>Massa Corrida</h2>
            <p>Preparação de superfícies com massa corrida, garantindo um acabamento liso e perfeito antes da pintura final.</p>
        </div>
    </div>

    <div class="contato text-center mt-5">
        <h3>Entre em Contato Conosco</h3>
        <p>Para solicitar um orçamento ou mais informações sobre nossos serviços, entre em contato:</p>
        <p>Email: <a href="mailto:contato@empresa.com">cadamuropintura@gmail.com</a></p>
        <p>Telefone: <a href="tel:+5511999999999">(14) 3275-1066</a></p>
    </div>
</div>
@endsection
