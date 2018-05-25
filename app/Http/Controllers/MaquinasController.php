<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Maquina;

//Request
use App\Http\Requests\MaquinaRequest;

//Repositories
use App\Repositories\MaquinaRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\MaquinasDataTable;

class MaquinasController extends Controller
{
  
    public function index(MaquinasDataTable $dataTable)
    {                          
        return $dataTable->render('moduloSiniestros.maquinas.listado',$this->selects());     
    }

    public function create()
    {
        return view('moduloSiniestros.maquinas.crear')->with($this->selects());     
    }

    public function store(MaquinaRequest $request)
    { 
        $input = $request->all();
        Maquina::create($input);
        flash('Maquina <b>'. $input['nombre'].' </b>grabada de forma satisfactoria.', 'success');
        return Redirect::back();
    }
 
    public function edit($id)
    {
        $maquina = Maquina::findOrFail($id);
        return view('moduloSiniestros.maquinas.editar')->with('maquina',$maquina)->with($this->selects());
    }

    public function update(MaquinaRequest $request, $id)
    {
        $maquina = Maquina::findOrFail($id);
        $maquina -> fill($request->all());
        $maquina -> save();
        flash('<b>'.$maquina->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $maquina = Maquina::findOrFail($id);
        $maquina -> delete();
        flash('<b>'. $maquina->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function selects()
    {
        return [    
            'nombreMaquina'   => Maquina::select('nombre')->orderBy('nombre','asc')->pluck('nombre','nombre')->prepend('', ''),
        ];
    }

}
