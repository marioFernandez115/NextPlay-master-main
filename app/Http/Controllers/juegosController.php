<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Categoria;
use App\Models\Plataforma;

class juegosController extends Controller
{
    // Muestra la vista de juegos con filtros y juegos
    public function vistaJuegos(Request $request)
    {
        $categoriaId = $request->input('categoria');
        $plataformaId = $request->input('plataforma');

        // Construir la consulta base
        $query = Juego::with(['categoria', 'plataforma']);

        // Aplicar filtros si existen
        if ($categoriaId) {
            $query->where('categoria_id', $categoriaId);
        }

        if ($plataformaId) {
            $query->where('plataforma_id', $plataformaId);
        }

        // Paginar con 40 juegos por página (10 filas de 4)
        $juegos = $query->paginate(12);

        // Obtener todas las plataformas y categorías para los filtros
        $categorias = Categoria::all();
        $plataformas = Plataforma::all();

        return view('juegos', compact('juegos', 'categorias', 'plataformas'));
    }

    // Vista de ofertas
    public function vistaOfertas()
    {
        return view('ofertas');
    }
}
