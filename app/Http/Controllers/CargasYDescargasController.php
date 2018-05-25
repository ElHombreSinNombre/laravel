<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

use Illuminate\Support\Facades\Input;

class CargasYDescargasController extends Controller
{

    public function index()
    {
        return view('moduloCargasYDescargas.index');
    }

    public function opcion(Request $request)
    {
        dd($request->all());
        $carga=['Boluda','Suardiaz','WEC','MacAndrews','XPR','XPR_Algeciras','Nisa'];
        $descarga=array_push($carga,'Transfennica','MSC');
        if ($request->input('cargaYDescarga')==true){
            return view('moduloCargasYDescargas.index')->with('datos',$carga)->with('opcion',true);
        }else{
            return view('moduloCargasYDescargas.index')->with('datos',$descarga)->with('opcion',false);
        }
    }
    
}
