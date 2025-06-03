@extends('layouts.app')

@section('contenido')
<div class="container">
    <h1 class="mb-4">🎮 {{ __('general.MisJuegosFavoritos') }}</h1>

    <div class="row">
        @forelse ($favoritos as $juego)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 juego-card">
                @if($juego->imagen)
                <img src="{{ asset('storage/' . $juego->imagen) }}" class="card-img-top juego-img" alt="{{ $juego->titulo }}">
                @else
                <img src="{{ asset('images/default-game.jpg') }}" class="card-img-top juego-img" alt="{{ __('general.Sin imagen') }}">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $juego->titulo }}</h5>
                    <p class="card-text small text-muted mb-2">{{ \Illuminate\Support\Str::limit($juego->descripcion, 80) }}</p>
                    <p class="card-text mb-1"><strong>{{ number_format($juego->precio, 2) }} €</strong></p>
                    <p class="card-text">
                        <small class="text-muted">🎮 {{ $juego->plataforma->nombre ?? __('general.N/A') }} | 📂 {{ $juego->categoria->nombre ?? __('general.N/A') }}</small>
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">{{ __('general.Notienesjuegosfavoritos') }}</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $favoritos->links() }}
    </div>
</div>
@endsection