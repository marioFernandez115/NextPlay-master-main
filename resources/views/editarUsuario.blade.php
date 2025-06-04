@extends('layouts.app')

@section('titulo', __('general.editarUsuario'))

@section('contenido')

<p class="fs-5">{{ __('general.editarUsuariohola') }}, <strong>{{ Auth::user()->nombre_usuario }}</strong>. {{ __('general.editarUsuarioInfo') }}</p>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('usuario.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre_usuario" class="form-label">{{ __('general.editarUsuarionombre') }}</label>
        <input type="text" name="nombre_usuario" class="form-control" value="{{ old('nombre_usuario', Auth::user()->nombre_usuario) }}" required>
    </div>

    <div class="mb-3">
        <label for="avatar" class="form-label">{{ __('general.editarUsuarioavatar') }}</label><br>
        @if(Auth::user()->avatar)
        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ __('general.editarUsuarioavatarActu') }}" width="100" class="mb-2"><br>
        @endif
        <input type="file" name="avatar" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">
        {{ __('general.guardarCambios')  }}
    </button>
    @endsection