<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Compra;
use App\Models\Transaccion;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre_usuario',
        'email',
        'password',
        'avatar',
        'saldo',
        'rol',
        'fecha_registro',
        'fecha_nacimiento', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 🔗 Un usuario tiene muchas compras
     */
    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_comprador', 'id_usuario');
    }

    /**
     * 🔗 Un usuario tiene muchas transacciones
     */
    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'id_usuario', 'id_usuario');
    }

    /**
     * 🔐 Métodos obligatorios para autenticación
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }


    public function favoritos()
    {
        return $this->belongsToMany(Juego::class, 'favoritos', 'id_usuario', 'juego_id');
    }
}
