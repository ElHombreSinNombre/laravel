<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayuda extends Model 
{

	public $table = "ayudas";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    'modulo',
		'opcion',
		'descripcion',
		'grupo',
		'ruta'
	];

	public static $rules = [
	    "ruta" => "required",
		"modulo" => "required",
		"grupo" => "required",
		"opcion" => "required",
	];
	
}

