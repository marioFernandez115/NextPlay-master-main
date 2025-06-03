@extends('layouts.app')

@section('titulo', 'Detalles del Juego')

@section('contenido')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Detalles del Juego: {{ $juego->titulo }}</h2>

    <div class="card shadow-sm">
        <div class="row g-0">
            @if ($juego->imagen)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $juego->imagen) }}" class="img-fluid rounded-start" alt="{{ $juego->titulo }}">
            </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">{{ $juego->titulo }}</h4>
                    <p class="card-text"><strong>Descripción:</strong> {{ $juego->descripcion }}</p>
                    <p class="card-text"><strong>Precio:</strong> ${{ $juego->precio }}</p>
                    <p class="card-text"><strong>Fecha de Lanzamiento:</strong> {{ \Carbon\Carbon::parse($juego->fecha_lanzamiento)->format('d/m/Y') }}</p>
                    <p class="card-text"><strong>Categoría:</strong> {{ $juego->categoria->nombre }}</p>
                    <p class="card-text"><strong>Plataforma:</strong> {{ $juego->plataforma->nombre }}</p>
                    <p class="card-text"><strong>Desarrollador:</strong> {{ $juego->desarrollador }}</p>
                    <p class="card-text"><strong>Editor:</strong> {{ $juego->editor }}</p>
                    <p class="card-text"><strong>Clasificación por Edad:</strong> {{ $juego->clasificacion_edad }}+</p>
                    <p class="card-text"><strong>Stock Disponible:</strong> {{ $juego->stock }}</p>

                    <div class="mt-4">
                        <a href="{{ route('admin.juegos.edit', $juego->id) }}" class="btn btn-warning me-2">Editar</a>
                        <a href="{{ route('admin.juegos.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection