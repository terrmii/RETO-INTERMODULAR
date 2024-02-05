<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatosTiempoController;
use App\Http\Controllers\UbicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signUp']);
 
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::get('/obtener-ubicaciones', [UbicacionController::class, 'obtenerDatosUbicaciones']);

Route::get('/obtener-datos-nombre/{nombreUbicacion}', [DatosTiempoController::class, 'obtenerDatosNombre']);

Route::get('/obtener-temperatura/{nombreUbicacion}', [DatosTiempoController::class, 'obtenerTemperatura']);
