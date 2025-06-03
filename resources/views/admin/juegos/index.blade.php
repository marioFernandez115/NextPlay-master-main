@extends('layouts.app')

@section('titulo', 'Lista de Juegos')

@section('contenido')
<h1>Juegos registrados</h1>
<a href="{{ route('admin.juegos.create') }}" class="btn btn-primary mb-3">Nuevo juego</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Título</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($juegos as $juego)
        <tr>
            <td>{{ $juego->titulo }}</td>
            <td>${{ $juego->precio }}</td>
            <td>{{ $juego->stock }}</td>
   <td>
    <a href="{{ route('admin.juegos.show', $juego->id) }}" class="btn btn-info btn-sm me-1">Ver</a>
    <a href="{{ route('admin.juegos.edit', $juego->id) }}" class="btn btn-warning btn-sm me-1">Editar</a>
    <form action="{{ route('admin.juegos.destroy', $juego->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este juego?')" class="btn btn-danger btn-sm">Eliminar</button>
    </form>
</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<!-- Language Selector -->
<form method="GET" action="{{ route('language.change') }}" class="language-selector">
    <select name="lang" onchange="this.form.submit()">
        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>Português</option>
    </select>
</form>

