<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrenOperador extends Model
{
	
	protected $connection = 'oracle';
	
	public $table = "trenoperador";

	public $primaryKey = "id";
	    
	public $timestamps = true;

	public $fillable = [
	    "codigo",
	    "operador"
	];

	public static $rules = [
	    "operador" => "required",
	    "codigo" => "required"
	];

}
