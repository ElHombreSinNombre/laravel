<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Tablet;

//Request
use App\Http\Requests\TabletRequest;

//Repositories
use App\Repositories\TabletRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\TabletsDataTable;

class TabletsController extends Controller
{
    
    public function index(TabletsDataTable $dataTable)
    {
        return $dataTable->render('moduloVisitas.tablets.listado');      
    }

    public function create()
    {
        return view('moduloVisitas.tablets.crear');
    }

    public function store(TabletRequest $request)
    {
        $input = $request->all();
        Tablet::create($input);
        flash('Tablet <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function edit($id)
    {
        $tablet = Tablet::findOrFail($id);
        return view('moduloVisitas.tablets.editar')->with('tablet',$tablet);
    }

    public function update(TabletRequest $request, $id)
    {
        $tablet = Tablet::findOrFail($id);
        $tablet -> fill($request->all());
        $tablet -> save();
        flash('<b>'.$tablet->nombre.'</b> modificada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function destroy($id)
    {
        $tablet = Tablet::findOrFail($id);
        $tablet -> delete();
        flash('<b>'. $tablet->nombre .'</b> eliminado de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }
    
}
