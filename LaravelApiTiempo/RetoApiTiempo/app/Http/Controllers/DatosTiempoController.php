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
            'temperatura' => 'required|numeric',
            'humedad' => 'required|numeric',
            'viento' => 'required|numeric',
            'descripcion' => 'required|string',
        ]);
    
        // Crear un nuevo registro en la base de datos
        $datosTiempo = DatosTiempo::create([
            'nombre' => $request->input('nombre'),
            'temperatura' => $request->input('temperatura'),
            'humedad' => $request->input('humedad'),
            'viento' => $request->input('viento'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        // Puedes también usar el método save() como lo estás haciendo actualmente
    
        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Se han añadido correctamente los datos',
            'datos_tiempo' => $datosTiempo,
        ]);
    }
    

}
