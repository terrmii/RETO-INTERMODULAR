<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historicoUbicaciones extends Model
{
    protected $table = 'historico_ubicaciones';

    protected $fillable = [
        'id_ubicacion',
        'temperatura',
        'humedad',
        'viento',
        'descripcion',
        'fecha'
    ];

    public $timestamps = false; // Disable timestamps
    use HasFactory;
}
