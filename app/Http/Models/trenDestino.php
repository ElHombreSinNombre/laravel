<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrenDestino extends Model
{
	
	protected $connection = 'oracle';

	public $table = "trendestinos";

	public $primaryKey = "id";
	    
	public $timestamps = true;

	public $fillable = [
	    'ciudad',
	    'codigo'
	];

	public static $rules = [
	    "ciudad" => "required",
	    "codigo" => "required"	    
	];

}
