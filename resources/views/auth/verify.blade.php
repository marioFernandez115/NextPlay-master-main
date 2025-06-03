@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('verify.title') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('verify.resent') }}
                    </div>
                    @endif

                    {{ __('verify.check_email') }}
                    {{ __('verify.not_received') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            {{ __('verify.request_another') }}
                        </button>.
                    </form>
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

