<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{

	public $table = "cortes";

	public $primaryKey = "id";
	     
	public $timestamps = true;

	public $fillable = [
	    "descrip",
		"f_comienzo",
	    "f_final",
		"tipo",
	    "usuario"
	];

	public static $rules = [
	    "descrip" => "required",
	    "f_comienzo" => "required",
		"f_final" => "required"
	];
	
}
