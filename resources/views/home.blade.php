@extends('layouts.app')

@section('contenido')
<div class="container mt-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4 animate__animated animate__fadeInDown">
                <div class="card-body bg-light py-5">

                    <h1 class="display-4 fw-bold mb-4 text-primary">
                        {{ __('general.bienvenida_js', ['usuario' => Auth::user()->nombre_usuario ?? Auth::user()->name ?? 'Usuario']) }}
                    </h1>

                    {{--Saludo adicional --}}
                    <p class="lead">
                        {{ __('general.saludo', ['usuario' => Auth::user()->nombre_usuario ?? Auth::user()->name ?? 'Usuario']) }} 👑
                    </p>

                    {{-- Imagen animada --}}
                    <img src="https://media.giphy.com/media/hvRJCLFzcasrR4ia7z/giphy.gif"
                        alt="{{ __('general.alt_bienvenida') }}"
                        class="img-fluid my-4" style="max-height: 150px;">

                    {{-- Botón para explorar juegos --}}
                    <a href="{{ route('inicio') }}"
                        class="btn btn-lg btn-outline-primary mt-3">
                        {{ __('general.boton_explorar') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection