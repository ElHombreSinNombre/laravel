<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
	
	public $table = "parametros";

	public $primaryKey = "id";
    
	public $timestamps = true;
	
	public $fillable = [
		'modulo',
		'campo',
		'valor',
		'descripcion'
	];

	public static $rules = [
		'modulo' => 'required',
		'campo' => 'required'
	];

}
