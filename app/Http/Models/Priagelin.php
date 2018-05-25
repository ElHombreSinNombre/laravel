<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priagelin extends Model
{ 
	
	public $table = "priagelines";

	public $primaryKey = "id";
	     
	public $timestamps = true;

	public $fillable = [
	    "modulo",
		"cliente",
	    "principal",
		"agente",
		"linea",
	    "buscar",
		"caracteres",
	    "desde",
		"aplicacion"
	];

	public static $rules = [
	    "modulo" => "required",
	    "cliente" => "required",
		"buscar" => "required",
	];

}