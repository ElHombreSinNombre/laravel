<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiniestroDanio extends Model
{
    
    protected $connection = 'oracle_siniestros';

    public $table = "siniestro_danio";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "siniestro_id",
        "tipo_elemento_daniado_id",
        "observaciones"
    ];

    public static $rules = [
        "tipo_elemento_daniado_id" => "required",
    ];

}
