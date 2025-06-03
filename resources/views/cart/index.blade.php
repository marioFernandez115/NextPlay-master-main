@extends('layouts.app')

@section('contenido')
<div class="container">
    <h2 class="mb-4">🛒 {{ __('general.CarritoWelcome') }}</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($cart) > 0)
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>{{ __('general.CarritoImg') }}</th>
                <th>{{ __('general.CarritoJuego') }}</th>
                <th>{{ __('general.CarritoPrecio') }}</th>
                <th>{{ __('general.Carritocantidad') }}</th>
                <th>{{ __('general.CarritocantidadTotal') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>
                <td><img src="{{ asset('storage/' . $item['imagen']) }}" width="80"></td>
                <td>{{ $item['titulo'] }}</td>
                <td>{{ number_format($item['precio'], 2) }} €</td>
                <td>{{ $item['cantidad'] }}</td>
                <td>{{ number_format($item['precio'] * $item['cantidad'], 2) }} €</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger">{{ __('general.CarritoEliminar') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button class="btn btn-outline-secondary">{{ __('general.CarritoLimpiar') }}</button>
        </form>

        <h4>{{ __('general.CarritoTotalTotal') }} {{ number_format($total, 2) }} €</h4>

        <a href="{{ route('payment.checkout') }}" class="btn btn-success">
            {{ __('general.CarritoCompra') }}
        </a>
    </div>
    @else
    <div class="alert alert-info">{{ __('general.cart_empty') }}</div>
    @endif
</div>
@endsection