<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $table = 'juegos';

    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'fecha_lanzamiento',
        'imagen',
        'categoria_id',
        'plataforma_id',
        'desarrollador',
        'editor',
        'clasificacion_edad',
        'stock',
    ];

    /**
     * Relación con la categoría del juego.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Relación con la plataforma del juego.
     */
    public function plataforma()
    {
        return $this->belongsTo(Plataforma::class);
    }

    public function favoritosUsuarios()
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }
}
