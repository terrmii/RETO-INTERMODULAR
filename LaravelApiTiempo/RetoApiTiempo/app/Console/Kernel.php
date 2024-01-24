<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Generar temperaturas fake cada 15 segundas
        $schedule->call('\app\Http\Controllers\DatosTiempoController@temperaturaFalsa')->everyFifteenSeconds();
        // Recargar temperatura
        $schedule->call('\app\Http\Controllers\DatosTiempoController@temperaturaFalsa')->everyFifteenSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
