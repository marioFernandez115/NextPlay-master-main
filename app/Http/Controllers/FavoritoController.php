<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class FavoritoController extends Controller
{
    public function toggle(Juego $juego)
    {
        $user = auth()->user();

        if ($user->favoritos()->where('juego_id', $juego->id)->exists()) {
            $user->favoritos()->detach($juego->id);
        } else {
            $user->favoritos()->attach($juego->id);
        }

        return back();
    }

    public function index()
    {
        $favoritos = auth()->user()->favoritos()->with(['categoria', 'plataforma'])->paginate(12);

        return view('favoritos', compact('favoritos'));
    }
}
