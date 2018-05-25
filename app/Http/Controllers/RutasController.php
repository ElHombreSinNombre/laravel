<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Parametro;

//Facades
use Flash;

class RutasController extends Controller
{
 
    public function index()
    {
        $rutas=Parametro::where('modulo','RUTAS')->get();
        return view('moduloAdministracion.rutas.listado')->with('rutas',$rutas);     
    }

    public function guardar(Request $request, $id)
    {
        $ruta = Parametro::findOrFail($id);
        $ruta -> fill($request->all());
        $ruta -> save();
        flash('<b>'.$ruta->campo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

}
