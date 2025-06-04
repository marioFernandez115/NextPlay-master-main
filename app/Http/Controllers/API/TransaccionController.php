<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use App\Http\Resources\TransaccionResource;

class TransaccionController extends Controller
{
    public function index()
    {
        return TransaccionResource::collection(Transaccion::all());
    }

    public function store(Request $request)
    {
        $item = Transaccion::create($request->all());
        return new TransaccionResource($item);
    }

    public function show(Transaccion $transaccion)
    {
        return new TransaccionResource($transaccion);
    }

    public function update(Request $request, Transaccion $transaccion)
    {
        $transaccion->update($request->all());
        return new TransaccionResource($transaccion);
    }

    public function destroy(Transaccion $transaccion)
    {
        $transaccion->delete();
        return response()->json(null, 204);
    }
}
