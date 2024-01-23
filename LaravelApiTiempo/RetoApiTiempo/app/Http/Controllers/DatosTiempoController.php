<?php

namespace App\Http\Controllers;

use App\Models\DatosTiempo;
use Illuminate\Http\Request;

class DatosTiempoController extends Controller
{
    public function store(Request $request)
    {
        // Validar la solicitud si es necesario
        $request->validate([
            'nombre' => 'required|string',
            'temperatura_real' => 'required|numeric',
            'temperatura_fake' => 'required|numeric',
            'humedad' => 'required|numeric',
            'viento' => 'required|numeric',
            'descripcion' => 'required|string', 
        ]);
    
        // Intentar encontrar una fila con el mismo nombre
        $datosTiempo = DatosTiempo::where('nombre', $request->input('nombre'))->first();
    
        if ($datosTiempo) {
            // Si existe, actualizar los datos
            $datosTiempo->update([
                'temperatura' => $request->input('temperatura'),
                'humedad' => $request->input('humedad'),
                'viento' => $request->input('viento'),
                'descripcion' => $request->input('descripcion'),
                // Actualiza otros campos según sea necesario
            ]);
        } else {
            // Si no existe, crear una nueva fila
            $datosTiempo = DatosTiempo::create([
                'nombre' => $request->input('nombre'),
                'temperatura' => $request->input('temperatura'),
                'humedad' => $request->input('humedad'),
                'viento' => $request->input('viento'),
                'descripcion' => $request->input('descripcion'),
                // Crea otros campos según sea necesario
            ]);
        }
    
        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Datos almacenados correctamente',
            'datos_tiempo' => $datosTiempo,
        ]);
    }

    // app/Http/Controllers/DatosTiempoController.php

    public function index()
    {
        $datosTiempo = DatosTiempo::all();

        return response()->json([
            'message' => 'Datos obtenidos correctamente',
            'datos_tiempo' => $datosTiempo,
        ]);
    }

    

}
