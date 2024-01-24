<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class DatosTiempo extends Model
{
    
    protected $table = 'datosTiempos';
    protected $fillable = [
        'temperatura_real',
        'temperatura_fake',
        'humedad',
        'viento',
        'descripcion',
        'fecha',
        'id_ubicacion'
        
    ];
    public $timestamps = false; // Disable timestamps
    use HasFactory;
}
