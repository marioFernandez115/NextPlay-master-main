@extends('layouts.app')

@section('titulo', 'Crear Juego')

@section('contenido')
<div class="register-container">
    <div class="register-card">
        <h2 class="text-center register-title mb-4">Crear Juego</h2>

        <form action="{{ route('admin.juegos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" required>
                @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required></textarea>
                @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control @error('precio') is-invalid @enderror" required>
                @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fecha de lanzamiento -->
            <div class="mb-3">
                <label for="fecha_lanzamiento" class="form-label">Fecha de Lanzamiento</label>
                <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="form-control @error('fecha_lanzamiento') is-invalid @enderror" required>
                @error('fecha_lanzamiento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror" required>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Plataforma -->
            <div class="mb-3">
                <label for="plataforma_id" class="form-label">Plataforma</label>
                <select name="plataforma_id" id="plataforma_id" class="form-select @error('plataforma_id') is-invalid @enderror" required>
                    @foreach($plataformas as $plataforma)
                    <option value="{{ $plataforma->id }}">{{ $plataforma->nombre }}</option>
                    @endforeach
                </select>
                @error('plataforma_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Desarrollador -->
            <div class="mb-3">
                <label for="desarrollador" class="form-label">Desarrollador</label>
                <input type="text" name="desarrollador" id="desarrollador" class="form-control @error('desarrollador') is-invalid @enderror" required>
                @error('desarrollador')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <!-- Clasificación por edad -->
            <div class="mb-3">
                <label for="clasificacion_edad" class="form-label">Clasificación por Edad</label>
                <select name="clasificacion_edad" id="clasificacion_edad" class="form-select @error('clasificacion_edad') is-invalid @enderror" required>
                    <option value="">Selecciona una edad</option>
                    <option value="3">3 o Mas Años</option>
                    <option value="7">7 o Mas Años</option>
                    <option value="12">12 o Mas Años</option>
                    <option value="18">18 o Mas Años</option>
                </select>
                @error('clasificacion_edad')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Stock -->
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" required>
                @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-register btn-lg text-white">Crear Juego</button>
            </div>
        </form>
    </div>
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

