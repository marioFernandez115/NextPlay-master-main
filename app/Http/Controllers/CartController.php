<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
public function index()
{
    $cart = session()->get('cart', []);

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    return view('cart.index', compact('cart', 'total'));
}

    public function add(Request $request, $id)
    {
        $juego = Juego::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            $cart[$id] = [
                'titulo' => $juego->titulo,
                'precio' => $juego->precio,
                'cantidad' => 1,
                'imagen' => $juego->imagen
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Juego agregado al carrito');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Juego eliminado del carrito');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Carrito vaciado');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (!$cart || count($cart) === 0) {
            return redirect()->route('cart.index')->with('error', 'El carrito está vacío');
        }

        foreach ($cart as $id => $item) {
            Compra::create([
                'id_producto' => $id,
                'id_comprador' => Auth::id(),
                'fecha_compra' => now(),
                'precio_final' => $item['precio'],
                'estado_compra' => 'completada',
                'clave_entregada' => null
            ]);
        }

        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Compra completada con éxito');
    }
}
