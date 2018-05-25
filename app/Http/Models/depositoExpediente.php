<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoExpediente extends Model
{

    protected $connection = 'oracle';
    
    public $table = "deposito_expedientes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
        "codigo",
        "cliente_id",
        "intermediario_id",
        "num_documento_aduana",
        "tipo_documento_aduana",
        "descripcion_mercancia",
        "referencia_ATM",
        "fecha_apertura",
        "deposito_id",
	];

	public static $rules = [
	    "codigo" => "required",
    ];
    
    public function DepositoCliente()
    {
        return $this->belongsTo('App\Models\DepositoCliente','cliente_id')->withDefault();
    }

    public function DepositoIntermediario()
    {
        return $this->belongsTo('App\Models\DepositoIntermediario','intermediario_id')->withDefault();
    }

    public function DepositoTipoDocAduana()
    {
        return $this->belongsTo('App\Models\DepositoTipoDocAduana', 'tipo_documento_aduana_id')->withDefault();
    }

    public function DepositoOperacion()
    {
        return $this->hasMany('App\Models\DepositoOperacion','expediente_id')->withDefault();
    }


}
