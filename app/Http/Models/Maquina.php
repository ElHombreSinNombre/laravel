<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
	
    protected $connection = 'oracle_siniestros';

    public $table = "maquina";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"codigo"
	];

	public static $rules = [
	    "nombre" => "required",
		"codigo" => "required"
	];

}
