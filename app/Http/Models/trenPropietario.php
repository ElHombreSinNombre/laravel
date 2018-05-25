<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrenPropietario extends Model
{
	
	protected $connection = 'oracle';

	public $table = "trenpropietario";

	public $primaryKey = "id";
	    
	public $timestamps = true;

	public $fillable = [
	    "codigo",
		"propietario",
	];

	public static $rules = [
	    "codigo" => "required",
		"propietario" => "required"
	];

}
