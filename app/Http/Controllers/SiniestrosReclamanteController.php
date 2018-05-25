<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\SiniestroReclamante;
use App\Models\Reclamante;

class SiniestrosReclamanteController extends Controller
{
    public function create($id)
    {
        return view('moduloSiniestros.siniestros.siniestro_reclamante.crear')->with($this->selects())->with('id', $id);  
        
    }

    public function selects()
    {
        return [    
            'nombreReclamante' => Reclamante::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre', 'id')->prepend('', ''),     
        ];
    }

    public function store(Request $request)
    {
        $input = $request->all();
        SiniestroReclamante::create($input);
        flash('Reclamante <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $siniestro = SiniestroReclamante::findOrFail($id);
        $siniestro -> delete();
        flash('<b>'. $siniestro->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
    
}
