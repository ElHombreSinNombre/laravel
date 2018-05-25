<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
 
    protected $commands = [
        'App\Console\Commands\Leer',
		'App\Console\Commands\Estancias',
    ];

    protected function schedule(Schedule $schedule)
    {
         $schedule->command('enviar:estancias')->daily();
         $schedule->command('email:leer')->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

}
