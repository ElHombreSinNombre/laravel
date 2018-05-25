<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    protected $connection = 'oracle_horario';

    public $table = "CATEGORIA";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
       "nombre"
    ];

    public static $rules = [
        "nombre" => "required",
    ];

}

