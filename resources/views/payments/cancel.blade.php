@extends('layouts.app')

@section('contenido')
<div class="container text-center py-5">
    <h1 class="text-danger">❌ {{ __('general.pagoscancelados') }}</h1>
    <p>{{ __('general.pagoscanceladosInfo') }}</p>
    <a href="{{ route('cart.index') }}" class="btn btn-warning mt-3">{{ __('general.volverCancelados') }}</a>
</div>
@endsection