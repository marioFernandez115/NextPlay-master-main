<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\JuegoApiController;
use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\CompraController;
use App\Http\Controllers\API\FavoritosController;
use App\Http\Controllers\API\PlataformaController;
use App\Http\Controllers\API\TransaccionController;
use App\Http\Controllers\API\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\API\JuegoController;

Route::apiResource('juegos', JuegoController::class);


Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('compras', CompraController::class);
Route::apiResource('favoritoss', FavoritosController::class);
Route::apiResource('juegos', JuegoController::class);
Route::apiResource('plataformas', PlataformaController::class);
Route::apiResource('transaccions', TransaccionController::class);
Route::apiResource('users', UserController::class);
