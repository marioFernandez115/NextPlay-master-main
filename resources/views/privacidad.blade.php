@extends('layouts.app')

@section('contenido')
<div class="container my-5">
    <div class="p-4 border rounded shadow-sm bg-white">
        <h2 class="mb-4 border-bottom pb-2 text-primary fw-bold display-6 text-center">{{ __('general.politicadeprivacidad') }}</h2>

        <p class="fs-5">En <strong>NextPlay</strong>, tu privacidad es nuestra prioridad. Este documento explica cómo recopilamos, usamos y protegemos tus datos personales.</p>

        <ul class="fs-5">
            <li><strong>Recopilación:</strong> Solo solicitamos los datos esenciales para tu experiencia (nombre, correo y contraseña).</li>
            <li><strong>Uso:</strong> Tu información se usa para procesar pedidos, mejorar nuestros servicios y enviarte comunicaciones importantes.</li>
            <li><strong>No compartimos:</strong> Nunca vendemos ni compartimos tus datos con terceros sin tu consentimiento explícito.</li>
            <li><strong>Cookies:</strong> Utilizamos cookies para mejorar la navegación. Puedes desactivarlas desde tu navegador.</li>
            <li><strong>Derechos:</strong> Puedes acceder, modificar o eliminar tu información en cualquier momento desde tu perfil o escribiéndonos a <a href="mailto:privacidad@nextplay.com">privacidad@nextplay.com</a>.</li>
        </ul>

        <p class="fs-5 mt-3">Al usar NextPlay, aceptas esta política de privacidad. Estamos comprometidos a mantener tus datos seguros y transparentes.</p>
    </div>
</div>
@endsection