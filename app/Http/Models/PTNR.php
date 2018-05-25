<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTNR extends Model
{
    
    protected $connection = 'oracle';

    public $table = "ptnr";
    
    public $primaryKey = "ptnr";

    public $timestamps = false;

}
