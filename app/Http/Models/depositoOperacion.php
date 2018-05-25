<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositoOperacion extends Model
{

    protected $connection = 'oracle';
    
    public $table = "deposito_operaciones";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
        "expediente_id",
        "fecha",
        "tipo_operacion_id",
        "cliente_id",
        "transporte",
        "tipo_unidad_id",
        "unidades",
        "importe",
        "observaciones",
        "tipo_documento_aduana",
        "bultos",
	];

	public static $rules = [
	    "tipo_operacion_id" => "required",
    ];
    
    public function DepositoCliente()
    {
        return $this->belongsTo('App\Models\DepositoCliente', 'cliente_id')->withDefault();
    }

    public function DepositoTipoOperacion()
    {
        return $this->belongsTo('App\Models\DepositoTipoOperacion', 'tipo_operacion_id')->withDefault();
    }

    public function DepositoTipoDocAduana()
    {
        return $this->belongsTo('App\Models\DepositoTipoDocAduana', 'tipo_documento_aduana_id')->withDefault();
    }

    public function DepositoExpediente()
    {
        return $this->belongsTo('App\Models\DepositoExpediente','expediente_id')->withDefault();
    }

}