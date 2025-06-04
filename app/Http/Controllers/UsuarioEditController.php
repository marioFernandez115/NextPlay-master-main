<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Compra;
use App\Models\User;
use App\Models\Juego;
use App\Models\Transaccion;


class UsuarioEditController extends Controller
{

    public function edit()
    {
        $usuario = Auth::user();


        $compras = $usuario->compras()->with('juego')->orderByDesc('fecha_compra')->get();

        $totalGastado = $compras->sum('precio_final');

        // Cargar la vista con los datos
        return view('editarUsuario', compact('usuario', 'compras', 'totalGastado'));
    }



    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'No autenticado');
        }

        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $user->nombre_usuario = $request->nombre_usuario;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->save();

        return back()->with('success', 'Perfil actualizado correctamente.');
    }


    public function historial()
    {
        dd(get_class(Auth::user()));

        $usuario = Auth::user();

        if (!$usuario) {
            abort(403, 'No autenticado');
        }

        $compras = $usuario->compras()->with('juego')->orderByDesc('fecha_compra')->get();
        $totalGastado = $compras->sum('precio_final');

        return view('usuario.historial', compact('compras', 'totalGastado'));
    }
}
