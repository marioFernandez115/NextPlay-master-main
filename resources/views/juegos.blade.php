@extends('layouts.app')

@section('contenido')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    .juego-img {
        object-fit: cover;
        height: 200px;
    }

    .juego-card:hover {
        transform: scale(1.02);
        transition: 0.3s ease-in-out;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .pagination .page-item .page-link {
        color: #0d6efd;
        border-radius: 0.5rem;
        transition: all 0.3s ease-in-out;
    }

    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.5;
    }

    .btn-favorito {
        border: none;
        background: none;
        padding: 0;
        cursor: pointer;
        color: #dc3545;
        font-size: 1.25rem;
    }

    .btn-favorito:hover {
        color: #a71d2a;
    }

    .btn-icono {
        border: none;
        background: none;
        padding: 0;
        cursor: pointer;
        color: #0d6efd;
        font-size: 1.25rem;
    }

    .btn-icono:hover {
        color: #0a58ca;
    }

    .iconos-accion {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: auto;
    }
</style>

<div class="container">
    <h1 class="mb-4">{{ __('general.titulo_listado') }}</h1>

    <!-- Filtros -->
    <form id="filtro-form" method="GET" action="{{ route('juegos.index') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="plataforma" class="form-label">{{ __('general.plataforma') }}</label>
            <select name="plataforma" id="plataforma" class="form-select">
                <option value="">{{ __('general.todas') }}</option>
                @foreach ($plataformas as $plataforma)
                <option value="{{ $plataforma->id }}" {{ request('plataforma') == $plataforma->id ? 'selected' : '' }}>
                    {{ $plataforma->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label">{{ __('general.categoria') }}</label>
            <select name="categoria" id="categoria" class="form-select">
                <option value="">{{ __('general.todas') }}</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-primary w-100">{{ __('general.filtrar') }}</button>
        </div>
    </form>

    <!-- Listado de juegos -->
    <div id="juegos-lista" class="row">
        @forelse ($juegos as $juego)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 juego-card">
                @if($juego->imagen)
                <img src="{{ asset('storage/' . $juego->imagen) }}" class="card-img-top juego-img" alt="{{ $juego->titulo }}">
                @else
                <img src="{{ asset('images/default-game.jpg') }}" class="card-img-top juego-img" alt="{{ __('general.sin_imagen') }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $juego->titulo }}</h5>
                    <p class="card-text small text-muted mb-2">{{ \Illuminate\Support\Str::limit($juego->descripcion, 80) }}</p>
                    <p class="card-text mb-1"><strong>{{ number_format($juego->precio, 2) }} €</strong></p>
                    <p class="card-text">
                        <small class="text-muted">🎮 {{ $juego->plataforma->nombre ?? __('general.no_disponible') }} | 📂 {{ $juego->categoria->nombre ?? __('juegos.no_disponible') }}</small>
                    </p>

                    <div class="iconos-accion mt-auto">
                        <!-- Botón de favorito -->
                        <form action="{{ route('favoritos.toggle', $juego) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-favorito" aria-label="{{ __('general.marcar_favorito') }}">
                                <i class="bi bi-heart{{ auth()->user()->favoritos->contains($juego->id) ? '-fill' : '' }}"></i>
                            </button>
                        </form>

                        <!-- Botón de carrito -->
                        <form action="{{ route('cart.add', $juego->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn-icono" title="{{ __('general.agregar_carrito') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">{{ __('general.no_disponibles') }}</div>
        </div>
        @endforelse
    </div>

    <!-- Paginación -->
    @if ($juegos->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <ul class="pagination pagination-lg">
            @if ($juegos->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $juegos->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            @foreach ($juegos->links()->elements[0] as $page => $url)
            @if ($page == $juegos->currentPage())
            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            @if ($juegos->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $juegos->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </div>
    @endif
</div>
@endsection