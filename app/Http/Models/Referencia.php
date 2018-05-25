<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    
    protected $connection = 'oracle_horario';

    public $table = "referencia";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
       "nombre",
       "hora_Ini",
       "hora_Fin",
       "es_Trabajo"
    ];

    public static $rules = [
        "nombre" => "required",
    ];
    
}

