<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    
    public $table = "libros";

	public $primaryKey = "id";
    
    public $timestamps = false;
    
    public $fillable = [
        "nombre",
        "codigo",
        "email",
        "enviar",
    ];
    
    public static $rules = [
		'nombre' => 'required',
		'codigo' => 'required'
    ];
    
}
