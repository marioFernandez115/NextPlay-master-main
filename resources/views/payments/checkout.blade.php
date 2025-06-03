@extends('layouts.app')

@section('contenido')
<div class="container text-center">
    <h2>{{ __('general.resumenCompra') }}</h2>
    <p>{{ __('general.resumenCompraInfo') }}</p>

    <form action="https://checkout.stripe.com/pay/{{ session('checkout_id') }}" method="GET">
        <button class="btn btn-primary mt-4">{{ __('general.resumenComprapreceso') }}</button>
    </form>
</div>
@endsection