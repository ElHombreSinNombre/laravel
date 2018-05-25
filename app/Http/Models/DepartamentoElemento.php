<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentoElemento extends Model 
{
	
	public $table = "department_element";

	public $primaryKey = "id";
     
	public $timestamps = true;

	public $fillable = [
		"departments_id" ,
		"security_element_id"
	];

	public static $rules = [
		"departments_id"=>"required",
		"security_element_id"=>"required"
	];

}
