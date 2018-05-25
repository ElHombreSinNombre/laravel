<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Estancias extends Command
{

    protected $signature = 'enviar:estancias';

    protected $description = 'Enviar correos de estancias';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //
    }

}
