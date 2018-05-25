<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Leer extends Command
{

    protected $signature = 'email:leer';

    protected $description = 'Leer email de Noatum.bio@gmail.com';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //
    }

}
