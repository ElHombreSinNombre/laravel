<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Reclamante;

//Request
use App\Http\Requests\ReclamanteRequest;

//Repositories
use App\Repositories\ReclamanteRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\ReclamantesDataTable;

class ReclamantesController extends Controller
{

    public function index(ReclamantesDataTable $dataTable)
    {    
        return $dataTable->render('moduloSiniestros.reclamantes.listado',$this->selects());     
    }

    public function create()
    {
        return view('moduloSiniestros.reclamantes.crear')->with($this->selects());     
    }

    public function store(ReclamanteRequest $request)
    { 
        $input = $request->all();
        Reclamante::create($input);
        flash('Reclamante <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $reclamante = Reclamante::findOrFail($id);
        return view('moduloSiniestros.reclamantes.editar')->with('reclamante',$reclamante)->with($this->selects());
    }

    public function update(ReclamanteRequest $request, $id)
    {
        $reclamante = Reclamante::findOrFail($id);
        $reclamante -> fill($request->all());
        $reclamante -> save();
        flash('<b>'.$reclamante->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $reclamante = Reclamante::findOrFail($id);
        $reclamante -> delete();
        flash('<b>'. $reclamante->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function selects()
    {
        return [    
            'nombreReclamante'   => Reclamante::select('nombre')->orderBy('nombre','asc')->pluck('nombre','nombre')->prepend('', ''),
        ];
    }

}
