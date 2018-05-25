<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablet extends Model
{
    
    public $table = "tablets";

    public $primaryKey = "id";
    
    public $timestamps = true;

	public $fillable = [
        "name",
        "ubicacion",
        "mac",
	];

	public static $rules = [
	    "name" => "required",
    ];
    
}
