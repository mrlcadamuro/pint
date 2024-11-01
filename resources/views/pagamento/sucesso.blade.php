@extends('layouts.main')

@section('content')
    <h2>Pagamento Aprovado!</h2>
    <p>ID do Pagamento: {{ $payment->id }}</p>
    <p>Status: {{ $payment->status }}</p>
    <p>Valor: R$ {{ number_format($payment->transaction_amount, 2, ',', '.') }}</p>
@endsection
