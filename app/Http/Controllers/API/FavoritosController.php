<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favoritos;
use Illuminate\Http\Request;
use App\Http\Resources\FavoritosResource;

class FavoritosController extends Controller
{
    public function index()
    {
        return FavoritosResource::collection(Favoritos::all());
    }

    public function store(Request $request)
    {
        $item = Favoritos::create($request->all());
        return new FavoritosResource($item);
    }

    public function show(Favoritos $favoritos)
    {
        return new FavoritosResource($favoritos);
    }

    public function update(Request $request, Favoritos $favoritos)
    {
        $favoritos->update($request->all());
        return new FavoritosResource($favoritos);
    }

    public function destroy(Favoritos $favoritos)
    {
        $favoritos->delete();
        return response()->json(null, 204);
    }
}
