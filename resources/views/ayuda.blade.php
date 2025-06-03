@extends('layouts.app')

@section('contenido')
<div class="container my-5">
    <div class="p-4 border rounded shadow-sm bg-white">
        <h2 class="mb-4 border-bottom pb-2 text-primary fw-bold display-6 text-center">{{ __('general.ayuda') }}</h2>

        <p class="fs-5">¿Necesitas asistencia? En <strong>NextPlay</strong> queremos que tu experiencia sea clara y sin complicaciones. Aquí te damos respuestas a las preguntas más frecuentes:</p>

        <ul class="fs-5">
            <li><strong>¿Cómo me registro?</strong> Haz clic en “Crear cuenta”, completa tus datos y confirma tu correo.</li>
            <li><strong>¿Cómo recupero mi contraseña?</strong> En la pantalla de inicio de sesión, haz clic en “¿Olvidaste tu contraseña?” y sigue los pasos.</li>
            <li><strong>¿Dónde veo mis juegos comprados?</strong> Ve a tu perfil y selecciona la sección “Mis juegos”.</li>
            <li><strong>¿Cómo contactar soporte?</strong> Escríbenos a <a href="mailto:soporte@nextplay.com">soporte@nextplay.com</a> y te responderemos en menos de 24h.</li>
            <li><strong>¿Cómo eliminar mi cuenta?</strong> Desde tu perfil, ve a “Configuración” y elige “Eliminar cuenta”.</li>
        </ul>

        <p class="fs-5 mt-3">Si no encuentras la respuesta que buscas, escríbenos. Estamos aquí para ayudarte en cada paso.</p>
    </div>
</div>
@endsection