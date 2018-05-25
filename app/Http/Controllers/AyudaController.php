<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Ayuda;

//Request
use App\Http\Requests\AyudaRequest;

//Repositories
use App\Repositories\AyudaRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\AyudasDataTable;

class AyudaController extends Controller
{
  
    public function index(AyudasDataTable $dataTable)
    {
        return $dataTable->render('moduloUtilidades.ayudas.listado');     
    }

    public function create()
    {
        return view('moduloUtilidades.ayudas.crear');   
    }

    public function store(AyudaRequest $request)
    {
        $input = $request->all();
        Ayuda::create($input);
        flash('Ruta <b>'. $input['ruta'].' </b>grabada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function edit($id)
    {
        $ayuda = Ayuda::findOrFail($id);
        return view('moduloUtilidades.ayudas.editar')->with('ayuda',$ayuda);   
    }

    public function update(AyudaRequest $request, $id)
    {
        $ayuda = Ayuda::findOrFail($id);
        $ayuda -> fill($request->all());
        $ayuda -> save();
        flash('<b>'.$ayuda->ruta.'</b> modificada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function destroy($id)
    {
        $ayuda = Ayuda::findOrFail($id);
        $ayuda -> delete();
        flash('<b>'. $ayuda->ruta .'</b> eliminada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function modal($id)
    {
        $descripcion = Ayuda::find($id);
        return view('moduloUtilidades.ayudas.modal')->with('descripcion',$descripcion->descripcion);    
    }

    public static function buscar($ruta)
    {
        if (strpos($ruta, 'edit') !==false || strpos($ruta, 'create') !==false){
            $texto=explode('/',$ruta);
            if(preg_match('#[0-9]#',$texto[1])){
                if (strpos($ruta, 'edit') !==false){	
                    $resultado=$texto[0].'/edit';
                    $ayuda= Ayuda::select('id','descripcion')->where('ruta',$resultado)->whereNotNull('descripcion')->first();
                }elseif (strpos($ruta, 'create') !==false){	
                    $resultado=$texto[0].'/create';
                    $ayuda= Ayuda::select('id','descripcion')->where('ruta',$resultado)->whereNotNull('descripcion')->first();
                }
            }else{
                $ayuda= Ayuda::select('id','descripcion')->where('ruta',$ruta)->whereNotNull('descripcion')->first();
            }
        }else{
            $ayuda= Ayuda::select('id','descripcion')->where('ruta',$ruta)->whereNotNull('descripcion')->first();
        }
        if($ayuda){
            return $ayuda;
        }
    }
    
}
    

