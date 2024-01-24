<?php

namespace App\Http\Controllers;

use App\Models\DatosTiempo;
use App\Models\Ubicacion;
use Http;
use Illuminate\Http\Request;

class DatosTiempoController extends Controller
{

    public function subirDatosMeteorologicos()
    {
        try {
            // Obtener todas las ubicaciones de la base de datos
            $ubicaciones = Ubicacion::all();

            foreach ($ubicaciones as $ubicacion) {
                $latitud = $ubicacion->latitud;
                $longitud = $ubicacion->longitud;

                // Obtener datos meteorológicos de OpenWeatherMap
                $weatherData = $this->getWeatherData($latitud, $longitud);

                // Guardar datos meteorológicos en la tabla DatosTiempo
                DatosTiempo::updateOrCreate(
                    ['id_ubicacion' => $ubicacion->id],
                [
                    'temperatura_real' => $weatherData['temperatura_real'],
                    'temperatura_fake' => $weatherData['temperatura_fake'],
                    'humedad' => $weatherData['humedad'],
                    'viento' => $weatherData['viento'],
                    'descripcion' => $weatherData['descripcion'],
                    'fecha' => now(),
                ]);
            }

            return response()->json(['message' => 'Datos meteorológicos actualizados correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

        private function getWeatherData($latitud, $longitud)
        {
            $apiKey = '253682c0bd759acfb4255d4aa08c3dd7'; // Reemplaza con tu clave de API de OpenWeatherMap
    
            // Realizar solicitud a la API de OpenWeatherMap usando Http de Laravel
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'lat' => $latitud,
                'lon' => $longitud,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'es'
            ]);
    
            $weatherData = $response->json();
    
            // Procesar datos y devolver un array con la información deseada
            return [
                'temperatura_real' => $weatherData['main']['temp'],
                'temperatura_fake' => $weatherData['main']['temp'],
                'humedad' => $weatherData['main']['humidity'],
                'viento' => $weatherData['wind']['speed'],
                'descripcion' => $weatherData['weather'][0]['description'],
                'fecha' => now(), // Fecha actual
            ];
            
        }
        public function temperaturaFalsa()
        {
            try {
                $temperaturas = DatosTiempo::all();
        
                foreach ($temperaturas as $temperatura) {
                    $temperaturaFake = $temperatura->temperatura_real;
                    $temperaturaFake = $temperaturaFake + rand(-2, 2);
        
                    // Actualizar la instancia actual
                    $temperatura->update([
                        'temperatura_fake' => $temperaturaFake,
                    ]);
                }
        
                return response()->json(['message' => 'Datos fake actualizados']);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
        
    

}
