<?php

namespace App\Http\Controllers;

use App\Models\ubicaciones;
use Http;
use Illuminate\Http\Request;

class UbicacionesController extends Controller
{
    public function actualizarUbicaciones()
    {
        // Obtener datos de la API
        $response = Http::get('https://www.el-tiempo.net/api/json/v2/provincias/20/municipios');
        $data = $response->json();

        // Actualizar la base de datos
        foreach ($data as $municipio) {
            $nombre = $municipio['municipio']['NOMBRE'];
            $latitud = $municipio['municipio']['CENTRO']['GEOGRAFIA']['lat'];
            $longitud = $municipio['municipio']['CENTRO']['GEOGRAFIA']['lon'];

            // Actualizar o crear la ubicación en la base de datos
            Ubicaciones::updateOrCreate(
                ['nombre' => $nombre],
                ['latitud' => $latitud, 'longitud' => $longitud]
            );
        }

        return response()->json(['message' => 'Ubicaciones actualizadas correctamente']);
    }
}
