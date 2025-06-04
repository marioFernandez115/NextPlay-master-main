<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
use App\Models\Usuario;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey = 'id_transaccion';
    public $timestamps = false;

    protected $fillable = [
        'id_compra',
        'id_usuario',
        'monto',
        'fecha_transaccion',
        'tipo_transaccion',
        'estado_transaccion',
    ];

    //  Relación: Transacción pertenece a una compra
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra', 'id_compra');
    }

    // Relación: Transacción pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }
}
