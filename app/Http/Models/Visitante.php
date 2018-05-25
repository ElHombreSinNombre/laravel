<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
	
	public $table = "visitantes";

	public $primaryKey = "id";
	
	public $incrementing = true; 
    
	public $timestamps = true;

	public $fillable = [
		"nombre",
		"apellidos",
		"empresa",
		"dni",
	];

	public static $rules = [
        'nombre' => 'required',
        'dni' => 'required'         
	];

}
