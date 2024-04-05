<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::resource('songs', SongController::class);
    Route::get('songs/search/{search}', [SongController::class, 'search']);

    Route::resource('clients', ClientController::class);
    Route::post('clients/dni', [ClientController::class, 'showByDni']);

    Route::resource('orders', OrderController::class);

    Route::post('combo/storage-order', [ComboController::class, 'storeOrder']);

    // songs -> para obtener todas las canciones
    // songs/search -> para buscar canciones
    // clients -> para obtener todos los clientes
    // clients/dni -> para buscar un cliente por dni
    // orders -> para obtener todos los pedidos
    // combo -> para crear un pedido
});
