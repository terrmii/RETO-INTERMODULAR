<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicaciones';

    protected $fillable = [
        'nombre',
        'latitud',
        'longitud'
    ];

    public $timestamps = false; // Disable timestamps

    use HasFactory;

    public function ubicacion()
    {
        return $this->belongsTo(DatosTiempo::class, 'id_ubicacion');
    }
}
