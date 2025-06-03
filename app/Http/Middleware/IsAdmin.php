<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    // Ejemplo de middleware IsAdmin
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol === 'admin') {
            return $next($request);
        }

        return redirect('home'); // Redirige a una página que no tenga acceso el administrador
    }
}
