<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Juego;
use Illuminate\Http\Request;
use App\Http\Resources\JuegoResource;

class JuegoController extends Controller
{
    public function index()
    {
        return JuegoResource::collection(Juego::all());
    }

    public function store(Request $request)
    {
        $item = Juego::create($request->all());
        return new JuegoResource($item);
    }

    public function show(Juego $juego)
    {
        return new JuegoResource($juego);
    }

    public function update(Request $request, Juego $juego)
    {
        $juego->update($request->all());
        return new JuegoResource($juego);
    }

    public function destroy(Juego $juego)
    {
        $juego->delete();
        return response()->json(null, 204);
    }
}
