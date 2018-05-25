<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\TipoPoliza;

//Request
use App\Http\Requests\PolizaRequest;

//Repositories
use App\Repositories\PolizasRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\TiposDePolizasDataTable;

class PolizasController extends Controller
{

    public function index(TiposDePolizasDataTable $dataTable)
    {                          
        return $dataTable->render('moduloSiniestros.tiposDePolizas.listado',$this->selects());     
    }

    public function create()
    {
        return view('moduloSiniestros.tiposDePolizas.crear')->with($this->selects());     
    }

    public function store(PolizaRequest $request)
    { 
        $input = $request->all();
        TipoPoliza::create($input);
        flash('Poliza <b>'. $input['nombre'].' </b>grabada de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $poliza = TipoPoliza::findOrFail($id);
        return view('moduloSiniestros.tiposDePolizas.editar')->with('poliza',$poliza)->with($this->selects()); 
    }

    public function update(PolizaRequest $request, $id)
    {
        $poliza = TipoPoliza::findOrFail($id);
        $poliza -> fill($request->all());
        $poliza -> save();
        flash('<b>'.$poliza->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $poliza = TipoPoliza::findOrFail($id);
        $poliza -> delete();
        flash('<b>'. $poliza->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function selects()
    {
        return [    
            'nombrePoliza'   => TipoPoliza::select('nombre')->orderBy('nombre','asc')->pluck('nombre','nombre')->prepend('', ''),
        ];
    }

}
