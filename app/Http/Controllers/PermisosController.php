<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Departamento;
use App\Models\ElementoSeguridad;
use App\Models\DepartamentoElemento;

//Facades
use Flash;
use Carbon;
use Excel;

class PermisosController extends Controller
{

    public function index()
    {
        $departamentos= Departamento::paginate(10);
        $elementos_seguridad= ElementoSeguridad::all();
        return view('moduloAdministracion.permisos.listado')->with('departamentos',$departamentos)->with('elementos_seguridad',$elementos_seguridad);     
    }

    public function store(Request $request)
    {
        if ($request->ajax()){   
            $departamento=  DepartamentoElemento::where('departments_id', $request->department_id)->where('security_element_id',$request->security_element_id)->first();
            if(!$departamento){
                DepartamentoElemento::create($request->all());
            }else{    
              $departamento->delete();
            }
        }   
    }

    public function excel()
    {
        $departamentos= Departamento::all();
        $elementos= ElementoSeguridad::all();
        Excel::create('Listado de permisos del '.Carbon:: now()->format('d/m/Y H:i:s'), function ($excel) use ($departamentos,$elementos) {
            $excel->setTitle("Listado de permisos del ".Carbon:: now()->format('d/m/Y H:i:s'));
            $excel->sheet('Hoja 1', function ($sheet) use ($departamentos,$elementos) {             
                foreach ($departamentos as $departamento) {
                     $arrayDepartamentos=array();
                     $arrayElementos=array('Departamentos');
                     $arrayDepartamentos[]=$departamento->name;   
                    foreach ($elementos as $elemento) {   
                        $arrayElementos[]=$elemento->name;   
                        if ($departamento->conPermiso($elemento->id)){
                            $arrayDepartamentos[]='Sí';    
                        }else{
                            $arrayDepartamentos[]='';    
                        }                        
                    };               
                    $sheet->appendRow(1, $arrayElementos);    
                    $sheet->appendRow($arrayDepartamentos);
                }
            });
        })->download('xls');
    }

}
