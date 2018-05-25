<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstanciaEmail extends Model
{
    
    public $table = "estancias_email";

	public $primaryKey = "id";
    
    public $timestamps = false;
    
    public $fillable = [
        "nombre",
        "codigo",
        "email",
        "email2",
        "email3",
    ];

    public static $rules = [
        'email' => 'nullable',
        'email2' => 'nullable',
        'email3' => 'nullable',
    ];
    
}
