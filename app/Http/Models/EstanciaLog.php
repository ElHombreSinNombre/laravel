<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstanciaLog extends Model
{
    
    protected $connection = 'oracle';

	public $table = "logs_estancias";
	
	public $timestamps = true;

	public $primaryKey = "id";

	public $fillable = [
	    "usuario",
		"descripcion",
		"datos",
		"estado",
    ];
    
}
