<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Priagelin;

//Request
use App\Http\Requests\PriagelinRequest;

//Repositories
use App\Repositories\PriagelinRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\PriagelinesDataTable;

class PriagelinesController extends Controller
{
   
    public function index(PriagelinesDataTable $dataTable)
    {                
        return $dataTable->render('moduloAdministracion.priagelines.listado');     
    }

    public function create()
    {
        return view('moduloAdministracion.priagelines.crear');     
    }

    public function store(PriagelinRequest $request)
    {
        $input = $request->all();
        Priagelin::create($input);
        flash('Priagelin <b>'. $input['principal'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $priagelin = Priagelin::findOrFail($id);
        return view('moduloAdministracion.priagelines.editar')->with('priagelin',$priagelin);
    }

    public function update(PriagelinRequest $request, $id)
    {
        $priagelin = Priagelin::findOrFail($id);
        $priagelin -> fill($request->all());
        $priagelin -> save();
        flash('<b>'.$priagelin->principal.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $priagelin = Priagelin::findOrFail($id);
        $priagelin -> delete();
        flash('<b>'. $priagelin->principal .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

}
