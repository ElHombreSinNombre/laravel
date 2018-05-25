<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProgramador extends Model
{
    
    public $table = "tipos_programador";

	public $primaryKey = "id";
    
    public $timestamps = false;
    
    public $fillable = [
        "descrip",
        "activo",
    ];
    
    public static $rules = [
        'activo' => 'required',
    ];
    
}
