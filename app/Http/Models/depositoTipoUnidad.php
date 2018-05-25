<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoTipoUnidad extends Model
{

	protected $connection = 'oracle';
	
    public $table = "deposito_tipos_unidades";

	public $primaryKey = "id";
    
	public $timestamps = true;

}
