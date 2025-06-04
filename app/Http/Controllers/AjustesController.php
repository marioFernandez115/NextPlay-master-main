<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjustesController extends Controller
{
    /**
     * Muestra la vista de ajustes de usuario.
     */
    public function ajustesWeb()
    {
        return view('ajustesWeb');
    }
}
