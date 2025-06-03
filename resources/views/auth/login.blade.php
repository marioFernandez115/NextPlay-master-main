@extends('layouts.app')

@section('titulo', __('login.title'))

@section('contenido')

<div class="login-container">
    <div class="login-card">

        <h2 class="text-center login-title mb-4">{{ __('login.title') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('login.email') }}</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('login.password') }}</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Remember me -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember">{{ __('login.remember') }}</label>
            </div>

            <!-- Submit -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login btn-lg text-white">{{ __('login.button') }}</button>
            </div>

            <!-- Links -->
            <div class="text-center text-muted">
                <small>
                    {{ __('login.no_account') }}
                    <a href="{{ route('register') }}">{{ __('login.register') }}</a>
                </small>
                <br>
                <small>
                    <a href="{{ route('password.request') }}">{{ __('login.forgot_password') }}</a>
                </small>
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

