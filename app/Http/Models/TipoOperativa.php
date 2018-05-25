<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoOperativa extends Model
{
	
    protected $connection = 'oracle_siniestros';

    public $table = "tipo_operativa";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
        "nombre"
	];

	public static $rules = [
	    "nombre" => "required",
	];

}
