<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SiniestrosTest extends TestCase
{

    public function SiniestrosList()
    {
        $this->visit('siniestros/listado');
    }

    public function SiniestrosCanCreate()
    {
        $this->visit('siniestros/create')->seePageIs('siniestros/listado');
    }

    public function SiniestrosCanDelete()
    {
        $this->visit('siniestros/create')->seePageIs('siniestros/listado');
    }

    public function SiniestrosCanEdit()
    {
        $this->visit('siniestros/edit')->seePageIs('siniestros/listado');
    }

    public function SiniestrosInforme()
    {
        $this->visit('siniestros/informes');
    }

}
