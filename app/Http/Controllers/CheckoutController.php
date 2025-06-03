<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function success(Request $request)
    {
        $juegoIds = explode(',', $request->query('juegos'));
        $juegos = Juego::whereIn('id', $juegoIds)->get();

        $juegosComprados = [];

        foreach ($juegos as $juego) {
            if ($juego->stock > 0) {
                $juego->decrement('stock');

                $juegosComprados[] = [
                    'nombre' => $juego->titulo,
                    'clave' => strtoupper(Str::random(10)),
                    'agotado' => false,
                ];
            } else {
                $juegosComprados[] = [
                    'nombre' => $juego->titulo,
                    'clave' => null,
                    'agotado' => true,
                ];
            }
        }

        return view('payments.success', compact('juegosComprados'));
    }
}
