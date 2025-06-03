<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as LaravelSession;

class StripePaymentController extends Controller
{
    public function checkoutForm()
    {

        $cart = session()->get('cart', []);
        $total = 0;
        $lineItems = [];

        foreach ($cart as $item) {
            $total += $item['precio'];

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item['titulo'],
                    ],
                    'unit_amount' => $item['precio'] * 100, // Stripe trabaja en céntimos
                ],
                'quantity' => 1,
            ];
        }

        if (empty($lineItems)) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));


        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
            'metadata' => [
                'user_id' => Auth::id()
            ]
        ]);

        // Redirige directamente a Stripe
        return redirect($session->url);
    }

    public function success()
    {
        $cart = session()->get('cart', []);
        session()->forget('cart');

        // Obtener todos los IDs de los juegos del carrito
        $juegoIds = implode(',', array_keys($cart)); // Ej: "1,3,5"

        return redirect()->route('checkout.success', ['juegos' => $juegoIds]);
    }



    public function cancel()
    {
        return view('payments.cancel');
    }
}
