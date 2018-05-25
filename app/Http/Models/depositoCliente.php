<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoCliente extends Model
{

	protected $connection = 'oracle';
	
    public $table = "deposito_clientes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
        "nombre",
        "persona_contacto",
        "telefono_contacto",
	];

	public static $rules = [
	    "nombre" => "required",
	];

}
