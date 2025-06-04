<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Juego;
use App\Models\User;
use App\Models\Transaccion;

class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    public $timestamps = false;

    protected $fillable = [
        'id_producto',
        'id_comprador',
        'fecha_compra',
        'precio_final',
        'estado_compra',
        'clave_entregada',
    ];


    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_comprador', 'id_usuario');
    }


    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_producto', 'id');
    }


    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'id_compra', 'id_compra');
    }
}
