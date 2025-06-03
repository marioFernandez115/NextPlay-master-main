@extends('layouts.app')

@section('contenido')
<div class="container my-5">
    <div class="p-4 border rounded shadow-sm bg-white">
        <h2 class="mb-4 border-bottom pb-2 text-primary fw-bold display-6 text-center">{{ __('general.teminosycondiciones') }}</h2>

        <p class="fs-5">Bienvenido a <strong>NextPlay</strong>, tu plataforma de confianza para comprar y descubrir videojuegos. Al acceder o utilizar nuestros servicios, aceptas estar legalmente vinculado a los siguientes términos:</p>

        <ul class="fs-5">
            <li><strong>Uso legal:</strong> Te comprometes a no usar NextPlay para actividades ilegales o no autorizadas.</li>
            <li><strong>Respeto entre usuarios:</strong> Está prohibido el acoso, los comentarios ofensivos y cualquier conducta que afecte a otros usuarios.</li>
            <li><strong>Edad mínima:</strong> Debes tener al menos 13 años para crear una cuenta, o contar con consentimiento parental.</li>
            <li><strong>Modificaciones:</strong> NextPlay se reserva el derecho de actualizar estos términos sin previo aviso. Revisa esta sección periódicamente.</li>
            <li><strong>Contenido:</strong> Nos reservamos el derecho a eliminar contenido que infrinja estas condiciones.</li>
        </ul>

        <p class="fs-5 mt-3">El uso continuado de NextPlay implica la aceptación de estos términos. Si tienes preguntas, contáctanos en <a href="mailto:legal@nextplay.com">legal@nextplay.com</a>.</p>
    </div>
</div>
@endsection