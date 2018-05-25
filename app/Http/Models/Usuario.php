<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model 
{

	public $table = "users";

	public $primaryKey = "id";
		
	public $timestamps = true;

	public $fillable = [
		"nombre",
		"apellidos",
		"user_name",
		"password",
		"department_id",
	];

	public static $rules = [
		"user_name" => "required",
		"password" => "required",
		"department_id" => "required",
	];

	public function departamento()
	{
		return $this->belongsTo('App\Models\Departamento', 'department_id')->withDefault();
	}

}

      
    
