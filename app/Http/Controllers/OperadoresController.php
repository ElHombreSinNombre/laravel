<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Request
use App\Http\Requests\TrenOperadoresRequest;

//Repositories
use App\Repositories\TrenOperadoresRepository;

//Models
use App\Models\TrenOperador;

//Facades
use Flash;

//Datatable
use App\DataTables\OperadoresDataTable;

class OperadoresController extends Controller
{

    public function index(OperadoresDataTable $dataTable)
    {                
        return $dataTable->render('moduloMovimientoTrenes.operadores.listado');     
    }

    public function create()
    {
        return view('moduloMovimientoTrenes.operadores.crear');     
    }

    public function store(TrenOperadoresRequest $request)
    {
        $input = $request->all();
        TrenOperador::create($input);
        flash('Operador <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $operador = TrenOperador::findOrFail($id);
        return view('moduloMovimientoTrenes.operadores.editar')->with('operador',$operador);     
    }

    public function update(TrenOperadoresRequest $request, $id)
    {
        $operador -> fill($request->all());
        $operador -> save();
        flash('<b>'.$operador->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $operador = TrenOperador::findOrFail($id);
        $operador -> delete();
        flash('<b>'. $operador->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

}
