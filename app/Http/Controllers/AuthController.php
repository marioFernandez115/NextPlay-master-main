<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombre_usuario' => 'required|string|max:255|unique:usuarios',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->route('auth.register')
                ->withErrors($validator)
                ->withInput();
        }

        // Manejo del avatar
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Crear un nuevo usuario
        $user = User::create([
            'nombre_usuario' => $request->nombre_usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
            'saldo' => 0, // Ajuste de saldo predeterminado
            'rol' => 'usuario', // Rol predeterminado como 'usuario'
        ]);

        // Iniciar sesión con el usuario recién registrado
        Auth::login($user);

        // Redirigir al login después de registrar
        return redirect()->route('auth.login'); // Redirige al formulario de login
    }

    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        // Validación de los datos del formulario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si el inicio de sesión es exitoso, redirigir al usuario
            return redirect()->intended(route('home')); // Redirige a la página de inicio o a la ruta solicitada
        }

        // Si las credenciales son incorrectas
        return redirect()->route('auth.login')
            ->withErrors(['email' => 'Las credenciales son incorrectas.'])
            ->withInput();
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login'); // Redirigir a la página de login
    }
}
