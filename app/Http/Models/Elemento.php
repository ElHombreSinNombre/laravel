<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
	
	protected $connection = 'oracle_siniestros';

    public $table = "tipo_elemento_daniado";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
	];

	public static $rules = [
	    "nombre" => "required",
	];

}