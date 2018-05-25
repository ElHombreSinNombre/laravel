<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitado extends Model
{ 
	
	public $table = "visitados";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
		"nombreapellidos",
		"departamento_id",
		"email",
	];

	public static $rules = [
        'nombreapellidos' => 'required'     
	];

}


