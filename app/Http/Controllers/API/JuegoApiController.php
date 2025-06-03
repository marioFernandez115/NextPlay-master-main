<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Plataforma;
use App\Models\Categoria;

class JuegoApiController extends Controller
{
    /**
     * Devuelve una lista de juegos con filtros opcionales.
     */



    public function index(Request $request)
    {
        $plataformas = Plataforma::all();
        $categorias = Categoria::all();

        return view('juegos', compact('plataformas', 'categorias'));
    }
    /**
     * Guarda un nuevo juego.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'fecha_lanzamiento' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria_id' => 'required|exists:categorias,id',
            'plataforma_id' => 'required|exists:plataformas,id',
            'desarrollador' => 'nullable|string',
            'editor' => 'nullable|string',
            'clasificacion_edad' => 'nullable|string',
            'stock' => 'required|integer',
        ]);

        // Subida de imagen
        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
        }

        // Crear el juego
        $juego = Juego::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'fecha_lanzamiento' => $validated['fecha_lanzamiento'],
            'imagen' => $imagenPath,
            'categoria_id' => $validated['categoria_id'],
            'plataforma_id' => $validated['plataforma_id'],
            'desarrollador' => $validated['desarrollador'],
            'editor' => $validated['editor'],
            'clasificacion_edad' => $validated['clasificacion_edad'],
            'stock' => $validated['stock'],
        ]);

        return response()->json($juego, 201);
    }

    /**
     * Mostrar un juego específico.
     */
    public function show($id)
    {
        $juego = Juego::with(['categoria', 'plataforma'])->findOrFail($id);
        return response()->json($juego);
    }

    /**
     * Actualizar un juego existente.
     */
    public function update(Request $request, $id)
    {
        $juego = Juego::findOrFail($id);

        $validated = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'precio' => 'sometimes|numeric',
            'fecha_lanzamiento' => 'sometimes|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria_id' => 'sometimes|exists:categorias,id',
            'plataforma_id' => 'sometimes|exists:plataformas,id',
            'desarrollador' => 'nullable|string',
            'editor' => 'nullable|string',
            'clasificacion_edad' => 'nullable|string',
            'stock' => 'sometimes|integer',
        ]);

        // Si hay nueva imagen, reemplazarla
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $juego->imagen = $imagenPath;
        }

        $juego->update($validated);

        return response()->json($juego);
    }

    /**
     * Eliminar un juego.
     */
    public function destroy($id)
    {
        $juego = Juego::findOrFail($id);
        $juego->delete();

        return response()->json(['mensaje' => 'Juego eliminado correctamente']);
    }
}
