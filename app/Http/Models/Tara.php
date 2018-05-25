<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tara extends Model
{

    protected $connection = 'oracle';

    public $table = "tara";

    public $primaryKey = "id";

    public $timestamps = false;

    public $fillable = [
        "trucker",
		"trk_in_date",
		"trk_out_date",
		"truck_lic",
		"dispatch_mode",
		"total_wgt",
		"ptrn_type",
		"eng_lnm",
    ];

}
