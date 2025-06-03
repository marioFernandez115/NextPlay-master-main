<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjustesController extends Controller
{
    // Método para mostrar los ajustes
    public function ajustesWeb()
    {
        return view('ajustesWeb');  // Asegúrate de que la vista exista
    }
}
