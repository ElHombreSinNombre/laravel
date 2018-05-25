<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{

    protected $connection = 'oracle';

    public $table = "truck_io";

    public $primaryKey = "id";

    public $timestamps = false;

    public $fillable = [
        "trk_in_date",
        "trk_out_date",
        "truck_co",
        "truck_lic",
        "cntr_no",
        "cntr_seq",
        "dispatch_mode",
        "staff_cd",
        "update_time",
        "total_wgt",
        "total_wgt2",
    ];

    public static $rules = [
        "trk_in_date"=>"required",
        "trk_out_date"=>"required"
	];

    public function pntr() {
        return $this->belongsTo('App\Models\PTNR', 'truck_lic','zip_cd')->withDefault();
    }

}
