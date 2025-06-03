@extends('layouts.app')

@section('contenido')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center fs-5">
                    {{ __('general.reset_password') }}
                </div>

                <div class="card-body p-4 form-container">
                    @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('general.email') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus>

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Botón enviar -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i> {{ __('general.enviarEmail') }}
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            {{ __('general.backToLogin') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
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