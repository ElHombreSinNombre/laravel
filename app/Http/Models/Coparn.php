<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coparn extends Model
{

    protected $connection = 'oracle';
	
	public $table = "coparn";
	
    public $timestamps = false;
    
}
