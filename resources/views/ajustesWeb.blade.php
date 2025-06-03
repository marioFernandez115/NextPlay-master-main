@extends('layouts.app')

@section('titulo', __('general.ajuestesTitulo'))

@section('contenido')
<div class="container">
    <h1 class="mb-4">{{ __('general.ajuestesTitulo') }}</h1>
    <div class="alert alert-info">
        {{ __('general.ajustesHola') }}, <strong>{{ Auth::user()->nombre_usuario }}</strong>. {{ __('general.ajustesInfo') }}
    </div>

    <div class="row">
        <div class="col-md-6">
            <h5>{{ __('general.ajustespreferenciasgenerales') }}</h5>
            <ul class="list-group mb-4">
                <li class="list-group-item">{{ __('general.ajuestesCambiaridioma') }}</li>
                <li class="list-group-item">{{ __('general.ajustesColorweb') }} </li>
            </ul>
        </div>
        <li class="list-group-item">
            <form action="{{ route('eliminarCuenta') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
            </form>
        </li>
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