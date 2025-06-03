@extends('layouts.app')

@section('contenido')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center fs-5">
                    {{ __('reset.title') }}
                </div>

                <div class="card-body p-4 form-container">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('reset.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autofocus>

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Nueva contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('reset.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required>

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">{{ __('reset.confirm_password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sync-alt me-2"></i>{{ __('reset.button') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formContainer = document.querySelector('.form-container');
        formContainer.classList.add('show');
    });
</script>
@endsection

@endsection

<!-- Language Selector -->
<form method="GET" action="{{ route('language.change') }}" class="language-selector">
    <select name="lang" onchange="this.form.submit()">
        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="pt" {{ app()->getLocale() == 'pt' ? 'selected' : '' }}>Português</option>
    </select>
</form>