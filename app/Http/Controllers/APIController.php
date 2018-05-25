<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Coparn;
use App\Models\Inventory;

//Facades
use Carbon;

class APIController extends Controller
{

   	//1.- Pin inexistente
	//2.- Pin disponible
	//3.- Pin disponible, contenedor no está en terminal
	//4.- Pin disponible, contenedor en terminal
	//5.- Pin disponible
	//6.- Pin no disponible
	//7.- Pin duplicado

	public function index(Request $request){
		$coparn = Coparn::where('MSG_REF_NO2',$request['pin'])->get();
		if(!$coparn->isEmpty()){
			if(count($coparn)==1){
				if(!$coparn[0]['used_date']){
					if(Carbon::createFromFormat('Y-m-d H:i:s', $coparn[0]['expire_date'])->format('Y-m-d H:i:s') > Carbon::now()){
						if ($coparn[0]['io_mode']=='O'){
							if ($coparn[0]['fe']=='F'){
								return $this->inventory($coparn[0]['cntr_no'],$request['pin']);
							}else{
								if (substr($coparn[0]['cntr_no'],0,4)!=='TEMP'){
									return $this->inventory($coparn[0]['cntr_no'],$request['pin']);
								}else{
									Log:: newLogs('contenedor',$request['pin'],'consulta','Pin disponible');
									return response()->json(5);
									//return 5;
								}
							}
						}else{
							Log:: newLogs('contenedor',$request['pin'],'consulta','Pin disponible');
							return response()->json(2);
							//return 2;	
						}
					}else{
						Log:: newLogs('contenedor',null,'consulta','Pin no disponible');
						return response()->json(6);
						//return 6;
					}	
				}else{
					Log:: newLogs('contenedor',null,'consulta','Pin no disponible');
					return response()->json(6);
					//return 6;	
				}
			}else{
				Log:: newLogs('contenedor',$request['pin'],'consulta','Pin duplicado');
				return response()->json(7);
				//return 7;	
			}
		}else{
			Log:: newLogs('contenedor',null,'consulta','Pin inexistente');
			return response()->json(1);
			//return 1;
		}
	}

	public function inventory($coparn,$pin){
		$inventory = Inventory::where('CNTR_NO',$coparn)->get();
		if(!$inventory->isEmpty()){
			Log:: newLogs('contenedor',$coparn,'consulta','Pin disponible, contenedor en terminal');
			return response()->json(4);
			//return 4;
		}else{
			Log:: newLogs('contenedor',$pin,'consulta','Pin disponible, contenedor no está en terminal');
			return response()->json(3);
			//return 3;
		}
    }
    
}
