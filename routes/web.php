<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioEditController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\juegosController;
use App\Http\Controllers\Admin\JuegoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AjustesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\API\JuegoApiController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\LanguageController;
/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::get('/juegos', [JuegoApiController::class, 'index'])->name('api.juegos.index');
Route::get('/ofertas', [juegosController::class, 'vistaOfertas'])->name('ofertas.index');
Route::get('/juegos', [juegosController::class, 'vistaJuegos'])->name('juegos.index');

/*
|--------------------------------------------------------------------------
| Autenticación (Login, Registro, Logout)
|--------------------------------------------------------------------------
*/
// Protección contra solicitudes GET al logout
Route::get('/logout', function () {
    abort(405);
});
Auth::routes();

/*
|--------------------------------------------------------------------------
| Área de usuario
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/editarUsuario', [UsuarioEditController::class, 'edit'])->name('editarUsuario');
    Route::put('/editarUsuario', [UsuarioEditController::class, 'update'])->name('usuario.update');
});

Route::get('/usuario/historial', [UsuarioEditController::class, 'historial'])
    ->middleware('auth')->name('usuario.historial');

Route::get('/cambiarAvatar', [UsuarioController::class, 'cambiarAvatar'])->name('cambiarAvatar');
Route::get('/ajustesWeb', [AjustesController::class, 'ajustesWeb'])->name('ajustesWeb');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::delete('/eliminarCuenta', [UsuarioController::class, 'eliminarCuenta'])->name('usuario.eliminar');

Route::middleware('auth')->group(function () {
    Route::get('/usuario/editar', [UsuarioEditController::class, 'edit'])->name('usuario.edit');
    Route::put('/usuario/editar', [UsuarioEditController::class, 'update'])->name('usuario.update');
    Route::post('/juegos/{juego}/favorito', [FavoritoController::class, 'toggle'])->name('favoritos.toggle');

    Route::post('/favoritos/{juego}/toggle', [FavoritoController::class, 'toggle'])->name('favoritos.toggle');
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos');
});

/*
|--------------------------------------------------------------------------
| Restablecer Contraseña
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Rutas de administración 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/juegos-admin', [JuegoController::class, 'index'])->name('admin.juegos.index');
    Route::get('/juegos/create', [JuegoController::class, 'create'])->name('admin.juegos.create');
    Route::post('/juegos', [JuegoController::class, 'store'])->name('admin.juegos.store');
    Route::get('/juegos/{id}/edit', [JuegoController::class, 'edit'])->name('admin.juegos.edit');
    Route::put('/juegos/{id}', [JuegoController::class, 'update'])->name('admin.juegos.update');
    Route::delete('/juegos/{id}', [JuegoController::class, 'destroy'])->name('admin.juegos.destroy');
    Route::get('/admin/juegos/{juego}', [JuegoController::class, 'show'])->name('admin.juegos.show');
});

/*
|--------------------------------------------------------------------------
| Carrito
|--------------------------------------------------------------------------
*/
Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrito/agregar/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/carrito/eliminar/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/carrito/vaciar', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/carrito/comprar', [CartController::class, 'checkout'])->name('cart.checkout');

/*
|--------------------------------------------------------------------------
| Stripe Payment
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [StripePaymentController::class, 'checkoutForm'])->name('payment.checkout');
    Route::get('/checkout/success', [StripePaymentController::class, 'success'])->name('payment.success');
    Route::get('/checkout/cancel', [StripePaymentController::class, 'cancel'])->name('payment.cancel');
});

Route::middleware('auth')->group(function () {

    Route::get('/checkout/success', [StripePaymentController::class, 'success'])->name('stripe.success');
    Route::get('/checkout/cancel', [StripePaymentController::class, 'cancel'])->name('stripe.cancel');
});



// eliminare cuenta 
Route::delete('/eliminarCuenta', [UsuarioController::class, 'eliminarCuenta'])->name('eliminarCuenta');

Route::get('/lang/{locale}', function ($locale) {
    $availableLocales = ['es', 'en', 'pt'];
    if (in_array($locale, $availableLocales)) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});
