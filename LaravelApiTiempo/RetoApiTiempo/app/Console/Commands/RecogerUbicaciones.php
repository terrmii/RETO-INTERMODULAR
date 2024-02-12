<?php

namespace App\Console\Commands;

use App\Http\Controllers\UbicacionesController;
use Illuminate\Console\Command;

class RecogerUbicaciones extends Command
{
    protected $signature = 'recoger:ubicaciones';

    protected $description = 'Ejecuta la función obtenerDatosReales del DatoActualController';

    protected $ubicacionesController;

    public function construct(UbicacionesController $ubicacionesController)
    {
        parent::construct();

        $this->ubicacionesController = $ubicacionesController;
    }

    public function handle()
    {
        $this->ubicacionesController->obtenerUbicaciones();
    }
}