<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrenMovimiento extends Model
{
	
	protected $connection = 'oracle';
    
	public $table = "trenmovimientos";

	public $primaryKey = "id";
	    
	public $timestamps = true;

	public $fillable = [
		"codigo",
		"fecha",
		"tipo_movimiento",
		"operador",
		"propietario",
		"numero_contenedores",
		"teus",
		"ciudad"
	];

	public static $rules = [
        'tipo_movimiento' => 'required',
	];

}
