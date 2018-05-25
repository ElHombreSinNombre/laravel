<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementoSeguridad extends Model 
{
	
	public $table = "security_element";
	
	public $primaryKey = "id";
				
	public $timestamps = true;

	public $fillable = [
		"name"
	];

	public static $rules = [
		"name"=>"required"
	];

}
