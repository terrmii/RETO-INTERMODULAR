<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ubicaciones extends Model
{
    protected $table = 'ubicaciones';

    protected $fillable = [
        'nombre',
        'latitud',
        'longitud'
    ];

    use HasFactory;
}
