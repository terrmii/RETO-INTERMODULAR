<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosTiempo extends Model
{
    protected $table = 'datos_tiempo';
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

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'idUbicacion');
    }

}
