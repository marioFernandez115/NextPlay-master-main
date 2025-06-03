<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Método para mostrar la vista de editar
    public function editar()
    {
        // Aquí puedes obtener los datos del usuario si es necesario
        return view('editarUsuario');
    }
    public function eliminarCuenta()
    {
        $usuario = auth()->user();

        auth()->logout(); // Cerramos la sesión antes de eliminar

        $usuario->delete(); // Eliminamos la cuenta

        return redirect('/')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}
