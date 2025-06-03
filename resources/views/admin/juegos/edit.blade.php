@extends('layouts.app')

@section('titulo', 'Editar Juego')

@section('contenido')
<div class="container mt-5">
    <h2 class="mb-4">Editar juego: {{ $juego->titulo }}</h2>

    <form action="{{ route('admin.juegos.update', $juego->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Título -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $juego->titulo) }}" class="form-control @error('titulo') is-invalid @enderror" required>
            @error('titulo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required>{{ old('descripcion', $juego->descripcion) }}</textarea>
            @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" value="{{ old('precio', $juego->precio) }}" class="form-control @error('precio') is-invalid @enderror" required>
            @error('precio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Fecha de lanzamiento -->
        <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento"
            value="{{ old('fecha_lanzamiento', \Carbon\Carbon::parse($juego->fecha_lanzamiento)->format('Y-m-d')) }}"
            class="form-control" required>

        <!-- Imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
            @error('imagen')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($juego->imagen)
            <img src="{{ asset('storage/' . $juego->imagen) }}" class="img-thumbnail mt-2" width="150" alt="Imagen actual">
            @endif
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-select" required>
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id', $juego->categoria_id) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Plataforma -->
        <div class="mb-3">
            <label for="plataforma_id" class="form-label">Plataforma</label>
            <select name="plataforma_id" id="plataforma_id" class="form-select" required>
                @foreach($plataformas as $plataforma)
                <option value="{{ $plataforma->id }}" {{ old('plataforma_id', $juego->plataforma_id) == $plataforma->id ? 'selected' : '' }}>
                    {{ $plataforma->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Desarrollador -->
        <div class="mb-3">
            <label for="desarrollador" class="form-label">Desarrollador</label>
            <input type="text" name="desarrollador" id="desarrollador" value="{{ old('desarrollador', $juego->desarrollador) }}" class="form-control" required>
        </div>

        <!-- Editor -->
        <div class="mb-3">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" name="editor" id="editor" value="{{ old('editor', $juego->editor) }}" class="form-control" required>
        </div>

        <!-- Clasificación por edad -->
        <div class="mb-3">
            <label for="clasificacion_edad" class="form-label">Clasificación por Edad</label>
            <select name="clasificacion_edad" id="clasificacion_edad" class="form-select" required>
                <option value="3" {{ old('clasificacion_edad', $juego->clasificacion_edad) == 3 ? 'selected' : '' }}>3</option>
                <option value="7" {{ old('clasificacion_edad', $juego->clasificacion_edad) == 7 ? 'selected' : '' }}>7</option>
                <option value="12" {{ old('clasificacion_edad', $juego->clasificacion_edad) == 12 ? 'selected' : '' }}>12</option>
                <option value="18" {{ old('clasificacion_edad', $juego->clasificacion_edad) == 18 ? 'selected' : '' }}>18</option>
            </select>
        </div>

        <!-- Stock -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $juego->stock) }}" class="form-control" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success btn-lg">Actualizar Juego</button>
        </div>
    </form>
</div>
@endsection

<!-- Language Selector -->
<form method="GET" action="{{ route('language.change') }}" class="language-selector">
    <select name="lang" onchange="this.form.submit()">
        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>Português</option>
    </select>
</form>

