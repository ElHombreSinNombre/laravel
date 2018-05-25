<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscalaLog extends Model
{
    
    protected $connection = 'oracle';

    public $table = "logs_escalas";

	public $primaryKey = "id";
    
    public $timestamps = true;
    
    public $fillable = [
        "texto",
        "fecha",
        "tema",
        "nombre",
        "de",
        "para",
        "estado",
        "observaciones",
        "out_voyage",
        "imo",
        "barco",
        "eta",
        "out_voyage_old",
	];

}
