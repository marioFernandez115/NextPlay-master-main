<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Juego;
use App\Models\Categoria;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    // Listar todos los juegos
    public function index()
    {
        $juegos = Juego::all();
        return view('admin.juegos.index', compact('juegos'));
    }

    // Mostrar formulario para crear un nuevo juego
    public function create()
    {
        $categorias = Categoria::all();
        $plataformas = Plataforma::all();
        return view('admin.juegos.create', compact('categorias', 'plataformas'));
    }

    // Guardar un nuevo juego
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'fecha_lanzamiento' => 'required|date',
            'imagen' => 'nullable|image',
            'categoria_id' => 'required|exists:categorias,id',
            'plataforma_id' => 'required|exists:plataformas,id',
            'desarrollador' => 'required|string|max:255',
            'clasificacion_edad' => 'required|string|max:10',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('imagenes/juegos', 'public');
        }

        Juego::create($validated);

        return redirect()->route('admin.juegos.index')->with('success', 'Juego creado con éxito');
    }

    // Mostrar formulario para editar un juego existente
    public function edit($id)
    {
        $juego = Juego::findOrFail($id);
        $categorias = Categoria::all();
        $plataformas = Plataforma::all();

        return view('admin.juegos.edit', compact('juego', 'categorias', 'plataformas'));
    }

    // Actualizar un juego existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'fecha_lanzamiento' => 'required|date',
            'imagen' => 'nullable|image',
            'categoria_id' => 'required|exists:categorias,id',
            'plataforma_id' => 'required|exists:plataformas,id',
            'desarrollador' => 'required|string|max:255',
            'clasificacion_edad' => 'required|string|max:10',
            'stock' => 'required|integer',
        ]);

        $juego = Juego::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('imagenes/juegos', 'public');
        } else {
            $validated['imagen'] = $juego->imagen;
        }

        $juego->update($validated);

        return redirect()->route('admin.juegos.index')->with('success', 'Juego actualizado con éxito');
    }

    // Eliminar un juego
    public function destroy($id)
    {
        $juego = Juego::findOrFail($id);
        $juego->delete();

        return redirect()->route('admin.juegos.index')->with('success', 'Juego eliminado con éxito');
    }
    public function show($id)
    {
        $juego = Juego::findOrFail($id);
        return view('admin.juegos.show', compact('juego'));
    }
}
