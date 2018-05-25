<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    
    protected $connection = 'oracle';

	public $table = "logs";
	
    public $timestamps = true;
    
    public $primaryKey = "id";

	public $fillable = [
	    "usuario",
		"descrip",
		"modulo",
		"estado",
    ];
    
}
