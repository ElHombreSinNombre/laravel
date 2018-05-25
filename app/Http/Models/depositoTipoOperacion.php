<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoTipoOperacion extends Model
{

	protected $connection = 'oracle';
	
    public $table = "deposito_tipos_operaciones";

	public $primaryKey = "id";
    
	public $timestamps = true;

}
