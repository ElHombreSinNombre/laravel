<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\TipoObjetoSiniestro;

//Request
use App\Http\Requests\TipoObjetoSiniestroRequest;

//Repositories
use App\Repositories\TipoObjetoSiniestroRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\TiposDeObjetosDataTable;

class ObjetosController extends Controller
{

    public function index(TiposDeObjetosDataTable $dataTable)
    {                
        return $dataTable->render('moduloSiniestros.tiposDeObjetos.listado',$this->selects());               
    }

    public function create()
    {
        return view('moduloSiniestros.tiposDeObjetos.crear')->with($this->selects());     
    }

     public function store(TipoObjetoSiniestroRequest $request)
    { 
        $input = $request->all();
        TipoObjetoSiniestro::create($input);
        flash('Objeto <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
 
    public function edit($id)
    {
        $objeto = TipoObjetoSiniestro::findOrFail($id);
        return view('moduloSiniestros.tiposDeObjetos.editar')->with('objeto',$objeto)->with($this->selects());
    }

    public function update(TipoObjetoSiniestroRequest $request, $id)
    {
        $objeto = TipoObjetoSiniestro::findOrFail($id);
        $objeto -> fill($request->all());
        $objeto -> save();
        flash('<b>'.$objeto->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $objeto = TipoObjetoSiniestro::findOrFail($id);
        $objeto -> delete();
        flash('<b>'. $objeto->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function selects()
    {
        return [    
            'nombreObjeto'   => TipoObjetoSiniestro::select('nombre')->orderBy('nombre','asc')->pluck('nombre','nombre')->prepend('', ''),
        ];
    }

}
