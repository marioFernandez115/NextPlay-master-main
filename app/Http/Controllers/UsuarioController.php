<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para mostrar la vista de editar
    public function editar()
    {

        return view('editarUsuario');
    }
    public function eliminarCuenta()
    {
        $usuario = auth()->user();

        auth()->logout();

        $usuario->delete();

        return redirect('/')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}
