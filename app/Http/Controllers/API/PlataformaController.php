<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Plataforma;
use Illuminate\Http\Request;
use App\Http\Resources\PlataformaResource;

class PlataformaController extends Controller
{
    public function index()
    {
        return PlataformaResource::collection(Plataforma::all());
    }

    public function store(Request $request)
    {
        $item = Plataforma::create($request->all());
        return new PlataformaResource($item);
    }

    public function show(Plataforma $plataforma)
    {
        return new PlataformaResource($plataforma);
    }

    public function update(Request $request, Plataforma $plataforma)
    {
        $plataforma->update($request->all());
        return new PlataformaResource($plataforma);
    }

    public function destroy(Plataforma $plataforma)
    {
        $plataforma->delete();
        return response()->json(null, 204);
    }
}
