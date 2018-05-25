<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{

	public $table = "visitas";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
		"nombre",
		"apellidos",
		"empresa",
		"dni",
		"f_entrada",
		"f_salida",
		"visitado_id",
		"motivo",
		"f_salidaauto",
		"firma",
		"previsita"
	];

	public static $rules = [
        'nombre' => 'required',    
	];

	public function visitado()
    {
		return $this->belongsTo('App\Models\Visitado','visitado_id')->withDefault();
	}
	
}
