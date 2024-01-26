<?php

namespace App\Http\Controllers;

use App\Models\DatosTiempo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosTiempoController extends Controller
{
    public function obtenerDatosNombre($nombre){
        $datos = DB::select('SELECT nombre, temperatura_fake, humedad, viento, descripcion FROM ubicaciones INNER JOIN datos_tiempo ON  ubicaciones.id = datos_tiempo.id_ubicacion WHERE ubicaciones.nombre = "'.$nombre.'" ; ');

        return response()->json($datos);
    }
}
