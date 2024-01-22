<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class DatosTiempo extends Model
{
    
    protected $table = 'datosTiempos';
    protected $fillable = [
        'nombre',
        'temperatura',
        'humedad',
        'viento',
        'descripcion',
        // Agrega aquí otros campos que desees permitir en la asignación masiva
    ];
    public $timestamps = false; // Disable timestamps
    use HasFactory;
}
