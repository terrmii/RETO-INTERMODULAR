<?php

namespace App\Http\Controllers;

use App\Models\ubicaciones;
use Http;
use Illuminate\Http\Request;

class UbicacionesController extends Controller
{
    public function obtenerUbicaciones()
    {
        try {
            $response = Http::get('https://www.el-tiempo.net/api/json/v2/provincias/20/municipios');
            $data = $response->json();
    
            if (isset($data['municipios'])) {
                foreach ($data['municipios'] as $municipio) {
                    $nombre = $municipio['NOMBRE'];
                    $latitud = $municipio['LATITUD_ETRS89_REGCAN95'];
                    $longitud = $municipio['LONGITUD_ETRS89_REGCAN95'];
    
                    ubicaciones::updateOrCreate(
                        ['nombre' => $nombre],
                        ['latitud' => $latitud, 'longitud' => $longitud]
                    );
                }
    
                return response()->json(['message' => 'Ubicaciones obtenidas correctamente']);
            } else {
                return response()->json(['error' => 'Estructura de datos inesperada en la respuesta de la API'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
