success.blade.php:

@extends('layouts.app')

@section('contenido')
<div class="container text-center py-5">
    <h1 class="text-success">✅ ¡Pago realizado con éxito!</h1>
    <p>Gracias por tu compra. Puedes ver tus juegos en el historial.</p>
    <a href="{{ route('inicio') }}" class="btn btn-primary mt-3">Volver al inicio</a>
</div>

<!-- Modal -->
<div class="modal fade" id="thanksModal" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="thanksModalLabel">🎮 ¡Gracias por tu compra!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center">
                @foreach ($juegosComprados as $juego)
                <p>Has adquirido: <strong>{{ $juego['nombre'] }}</strong></p>

                @if (!empty($juego['agotado']) && $juego['agotado'] === true)
                <div class="alert alert-danger fs-5 fw-bold mb-4">
                    ❌ No queda stock de este juego.
                </div>
                @else
                <p>Tu clave del juego es:</p>
                <div class="alert alert-secondary fs-4 fw-bold mb-4">
                    {{ $juego['clave'] }}
                </div>
                @endif
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar el modal al cargar la página -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('thanksModal'));
        myModal.show();
    });
</script>
@endsection