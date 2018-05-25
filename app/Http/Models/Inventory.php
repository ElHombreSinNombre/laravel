<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model 
{

	protected $connection = 'oracle';

    public $table = "inventory";

    public function getEscalasAttribute () {
        return $this->vsl_cd.' - '.$this->call_year.' - '.$this->call_seq;  
    }
    
}
