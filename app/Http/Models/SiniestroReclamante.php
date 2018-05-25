<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiniestroReclamante extends Model
{
    
    protected $connection = 'oracle_siniestros';

    public $table = "siniestro_reclamante";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "siniestro_id",
        "reclamante_id",
        "observaciones"
    ];

    public static $rules = [
        "reclamante_id" => "required",
    ];

}
