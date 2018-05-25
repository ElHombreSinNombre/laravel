<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siniestro extends Model
{

    protected $connection = 'oracle_siniestros';

    public $table = "siniestro";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "codigo",
        "fecha_recepcion",
        "fecha_siniestro",
        "pago_previsto",
        "pago_seguro",
        "pago_realizado",
        "estado",
        "identificacion",
        "descripcion",
        "notas",
        "path_documentacion",
        "tipo_operativa_id",
        "tipo_objeto_siniestro_id",
        "tipo_poliza_id",
        "maquina_id",
        "importe",
        "listareclamantes",
        "listadanios"

    ];

    public static $rules = [
        "codigo" => "required",
        "estado" => "required",
        'fecha_siniestro'=>'nullable',
        'fecha_recepcion'=>'nullable'  
    ];


    //Accessor de Eloquent
    public function getImporteAttribute()
    {
        if ($this->estado == "C") {
            $importe = $this->pago_previsto + $this->pago_seguro;
        }
        if ($this->estado == "A") {
            $importe = $this->pago_realizado + $this->pago_seguro;
        }
        return $importe."€"; 
    }
    
}


