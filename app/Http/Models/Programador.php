<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programador extends Model
{
    
    public $table = "programador";

	public $primaryKey = "id";
    
    public $timestamps = false;
    
    public $fillable = [
        "codigo",
        "tipo_id",
        "campo1",
        "campo2",
        "periocidad",
    ];
    
    public static $rules = [
        'codigo' => 'required',
    ];
    
}
