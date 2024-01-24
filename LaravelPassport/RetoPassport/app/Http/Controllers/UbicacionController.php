<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function obtenerDatosUbicaciones()
    {
        $ubicaciones = Ubicacion::all(['nombre', 'latitud', 'longitud']);
        return response()->json(['ubicaciones' => $ubicaciones]);
    }
}
