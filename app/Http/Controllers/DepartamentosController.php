<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Departamento;

//Request
use App\Http\Requests\DepartamentoRequest;

//Repositories
use App\Repositories\DepartamentoRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\DepartamentosDataTable;

class DepartamentosController extends Controller
{

    public function index(DepartamentosDataTable $dataTable)
    {
        return $dataTable->render('moduloAdministracion.departamentos.listado');   
    }

    public function create()
    {
        return view('moduloAdministracion.departamentos.crear');
    }

    public function store(DepartamentoRequest $request)
    {
        $input = $request->all();
        Departamento::create($input);
        flash('Departamento <b>'. $input['name'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $departamento = Departamento::findOrFail($id);
        return view('moduloAdministracion.departamentos.editar')->with('departamento',$departamento);     
    }

    public function update(DepartamentoRequest $request, $id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento -> fill($request->all());
        $departamento -> save();
        flash('<b>'.$departamento->name.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento -> delete();
        flash('<b>'. $departamento->name .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
    
}
