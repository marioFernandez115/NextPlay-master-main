@extends('layouts.app')

@section('titulo', __('general.inicioIndex'))

@section('contenido')

<div class="text-center mt-5">
    <h1 class="display-4 fw-bold">{{ __('general.title') }} <span class="text-primary">NextPlay</span></h1>
    <p class="lead">{{ __('general.CompraIndex') }}</p>
    <a href="{{ route('juegos.index') }}" class="btn btn-lg btn-primary mt-3">{{ __('general.Explorarjuegos') }}</a>
</div>

{{-- Imagen principal --}}
<section class="container my-5 fade-in">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
            <img src="{{ asset('img/Tiendas-Online-Juegos-PC-IP.png') }}" alt="{{ __('general.Tiendadevideojuegos') }}" class="img-fluid rounded shadow-lg">
        </div>
    </div>
</section>

{{-- ¿Qué es NextPlay? --}}
<section class="container my-5 fade-in">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold">{{ __('general.¿QuéesNextPlay?') }}</h2>
            <p>{{ __('general.NextPlaydescripción') }}</p>
            <ul class="list-unstyled">
                <li><i class="fas fa-gamepad text-primary me-2"></i> {{ __('general.Catálogoactualizado') }}</li>
                <li><i class="fas fa-lock text-primary me-2"></i> {{ __('general.Seguridadgarantizada') }}</li>
                <li><i class="fas fa-clock text-primary me-2"></i> {{ __('general.Entregadigitalinmediata') }}</li>
                <li><i class="fas fa-tags text-primary me-2"></i> {{ __('general.Ofertasexclusivas') }}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('img/pexels-photo-3165335.jpeg') }}" alt="Gaming" class="img-fluid rounded shadow">
        </div>
    </div>
</section>

{{-- Cómo funciona --}}
<section class="bg-light py-5 fade-in">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">{{ __('general.¿Cómofunciona?') }}</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <i class="fas fa-search fa-2x text-primary mb-2"></i>
                <h5>1. {{ __('general.Explora') }}</h5>
                <p>{{ __('general.Exploradescripción') }}</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-shopping-cart fa-2x text-primary mb-2"></i>
                <h5>2. {{ __('general.Compra') }}</h5>
                <p>{{ __('general.Compradescripción') }}</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-key fa-2x text-primary mb-2"></i>
                <h5>3. {{ __('general.Recibetuclave') }}</h5>
                <p>{{ __('general.Recibeclavedescripción') }}</p>
            </div>
        </div>
    </div>
</section>

{{-- Beneficios --}}
<section class="container my-5 fade-in">
    <h2 class="fw-bold text-center mb-4">{{ __('general.PorquéelegirNextPlay') }}</h2>
    <div class="row text-center">
        <div class="col-md-3">
            <i class="fas fa-star text-warning fa-2x mb-2"></i>
            <h6>{{ __('general.Confianza') }}</h6>
            <p>{{ __('general.Clientessatisfechos') }}</p>
        </div>
        <div class="col-md-3">
            <i class="fas fa-bolt text-danger fa-2x mb-2"></i>
            <h6>{{ __('general.Entregarápida') }}</h6>
            <p>{{ __('general.Recibeensegundos') }}</p>
        </div>
        <div class="col-md-3">
            <i class="fas fa-headset text-success fa-2x mb-2"></i>
            <h6>{{ __('general.Soporte24/7') }}</h6>
            <p>{{ __('general.Ayuda en todo momento') }}</p>
        </div>
        <div class="col-md-3">
            <i class="fas fa-globe text-info fa-2x mb-2"></i>
            <h6>{{ __('general.Coberturaglobal') }}</h6>
            <p>{{ __('general.Compradesdecualquierlugar') }}</p>
        </div>
    </div>
</section>

{{-- JS de animación --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fadeElements = document.querySelectorAll(".fade-in");
        const appearOnScroll = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("fade-in-visible");
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });
        fadeElements.forEach(el => appearOnScroll.observe(el));
    });
</script>

{{-- Estilo animación --}}
<style>
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .fade-in-visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@endsection