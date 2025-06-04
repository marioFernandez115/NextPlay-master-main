<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre_usuario' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    }

    protected function create(array $data)
    {
        // Guarda el avatar si se sube
        $avatarPath = null;
        if (isset($data['avatar'])) {
            $avatarPath = $data['avatar']->store('avatars');
        }

        return User::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol' => 'usuario',
            'avatar' => $avatarPath,
            'saldo' => 0,
        ]);
    }
}
