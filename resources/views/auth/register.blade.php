@extends('layouts.app')

@section('titulo', __('register.title'))

@section('contenido')

<div class="register-container">
    <div class="register-card">
        <h2 class="text-center register-title mb-4">{{ __('register.heading') }}</h2>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Usuario -->
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">{{ __('register.username') }}</label>
                <input id="nombre_usuario" type="text" class="form-control @error('nombre_usuario') is-invalid @enderror" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required autofocus>
                @error('nombre_usuario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Correo -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('register.email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <input type="hidden" name="rol" value="usuario">

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('register.password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-3">
                <label for="password-confirm" class="form-label">{{ __('register.confirm_password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <!-- Avatar -->
            <div class="mb-3">
                <label for="avatar" class="form-label">{{ __('register.avatar') }}</label>
                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                @error('avatar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ocultos -->
            <input type="hidden" name="saldo" value="0">
            <input type="hidden" name="rol" value="usuario">

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-register btn-lg text-white">{{ __('register.submit') }}</button>
            </div>

            <div class="text-center mt-3">
                <small class="text-muted">
                    {{ __('register.have_account') }}
                    <a href="{{ route('login') }}">{{ __('register.login') }}</a>
                </small>
            </div>
        </form>
    </div>
</div>
@endsection