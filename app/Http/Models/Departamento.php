<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model 
{
	
	public $table = "departments";

	public $primaryKey = "id";
		
	public $timestamps = true;

	public $fillable = [
		"name"	
	];

	public static $rules = [
		"name"=>"required"
	];

	public function departamentoElemento() {
		return $this->hasMany('App\Models\DepartamentoElemento', 'departments_id');
	}
	  
	//Método personalizado
	public function conPermiso($security_element_id) {
		$encontrado=false;
		$elementos_departamentos= $this->departamentoElemento()->get();   
			foreach ($elementos_departamentos as $elemento_departamento) {
				if($elemento_departamento->security_element_id==$security_element_id){
					$encontrado=true;
				}
			}
		return $encontrado;
	}
	
}
