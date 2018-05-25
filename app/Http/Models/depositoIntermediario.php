<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoIntermediario extends Model
{

	protected $connection = 'oracle';

    public $table = "deposito_intermediarios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
        "nombre",
	];

	public static $rules = [
	    "nombre" => "required",
	];
	
}
