<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamante extends Model
{
	
    protected $connection = 'oracle_siniestros';

    public $table = "reclamante";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
		"nombre",
	];

	public static $rules = [
	    "nombre" => "required",
	];

}
