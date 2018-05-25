<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\DepositoIntermediario;

//Request
use App\Http\Requests\IntermediarioRequest;

//Repositories
use App\Repositories\IntermediarioRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\IntermediariosDataTable;

class IntermediariosController extends Controller
{
    public function index(IntermediariosDataTable $dataTable)
    {                
        return $dataTable->render('moduloDepositoAduanero.intermediarios.listado');     
    }

    public function create()
    {
        return view('moduloDepositoAduanero.intermediarios.crear');
    }

    public function store(IntermediarioRequest $request)
    {
        $input = $request->all();
        DepositoIntermediario::create($input);
        flash('Intermediario <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $intermediario = DepositoIntermediario::findOrFail($id);
        return view('moduloDepositoAduanero.intermediarios.editar')->with('intermediario',$intermediario);
    }

    public function update(IntermediarioRequest $request, $id)
    {
        $intermediario = DepositoIntermediario::findOrFail($id);
        $intermediario -> fill($request->all());
        $intermediario -> save();
        flash('<b>'.$intermediario->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $intermediario = DepositoIntermediario::findOrFail($id);
        $intermediario -> delete();
        flash('<b>'. $intermediario->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
}
