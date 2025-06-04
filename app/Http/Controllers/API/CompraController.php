<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Http\Request;
use App\Http\Resources\CompraResource;

class CompraController extends Controller
{
    public function index()
    {
        return CompraResource::collection(Compra::all());
    }

    public function store(Request $request)
    {
        $item = Compra::create($request->all());
        return new CompraResource($item);
    }

    public function show(Compra $compra)
    {
        return new CompraResource($compra);
    }

    public function update(Request $request, Compra $compra)
    {
        $compra->update($request->all());
        return new CompraResource($compra);
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return response()->json(null, 204);
    }
}
