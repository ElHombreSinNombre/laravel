<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\SiniestroDanio;
use App\Models\Elemento;

class SiniestrosDanioController extends Controller
{
 
    public function create($id)
    {
        return view('moduloSiniestros.siniestros.siniestro_reclamante.crear')->with($this->selects())->with('id', $id);  
    }

    public function selects()
    {
        return [    
            'nombreDanio' => Elemento::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre', 'id')->prepend('', ''),     
        ];
    }

    public function store(Request $request)
    {
        $input = $request->all();
        SiniestroDanio::create($input);
        flash('Daño <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $siniestro = SiniestroDanio::findOrFail($id);
        $siniestro -> delete();
        flash('<b>'. $siniestro->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
    
}
