<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $fillable = ['nombre'];

    public function juegos()
    {
        return $this->hasMany(Juego::class);
    }
}
