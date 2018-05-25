<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoTipoDocAduana extends Model
{

	protected $connection = 'oracle';

    public $table = "deposito_tipo_doc_aduana";

	public $primaryKey = "id";
    
	public $timestamps = true;
	
}
