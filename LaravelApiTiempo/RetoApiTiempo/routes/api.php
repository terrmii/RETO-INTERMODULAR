<?php

use App\Http\Controllers\DatosTiempoController;
use App\Http\Controllers\UbicacionesController;
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

Route::get('/datos-dia', [DatosTiempoController::class, 'subirDatosMeteorologicos']);

Route::get('/obtener-ubicaciones', [UbicacionesController::class, 'obtenerUbicaciones']);

Route::get('/datos-fake', [DatosTiempoController::class, 'temperaturaFalsa']);

