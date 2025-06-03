@extends('layouts.app')

@section('contenido')
<div class="container text-center py-5">
    <h1 class="text-success">✅ {{ __('general.resumenPagoRealizado') }}</h1>
    <p>{{ __('general.resumenPagoRealizadoINfor') }}</p>
    <a href="{{ route('inicio') }}" class="btn btn-primary mt-3">{{ __('general.resumenPagoRealizadoINfor2') }}</a>
</div>
@endsection