<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Parametro;

//Facades
use Flash;

class ConfiguracionesController extends Controller
{

    public function visitas()
    {
        $visitas=Parametro::where('modulo','VISITAS')->get();
        return view('moduloVisitas.configuracion.visitas')->with('visitas',$visitas);  
    }

    public function guardarVisita($id){
        $visitas=Parametro::findOrFail($id);
        if ($visitas->valor==0){
            $visitas->valor=1;
        }else{
            $visitas->valor=0;
        }
        $visitas->save();
        flash('<b>Configuración de visitas</b> modificada correctamente.', 'success')->important();
        return Redirect::back();  
    }

    public function notificacion()
    {
        $notificacion=Parametro::where('modulo','NOTIFICACION')->get();
        return view('moduloVisitas.configuracion.notificacion')->with('notificaciones',$notificacion);  
    }

    public function guardarNotificacion($id){
        $notificacion=Parametro::findOrFail($id); 
        if ($notificacion->valor==0){
            $notificacion->valor=1;
        }else{
            $notificacion->valor=0;
        }
        $notificacion->save();
        flash('<b>Configuración de notificaciones</b> modificada correctamente.', 'success')->important();
        return Redirect::back();
    }
}
