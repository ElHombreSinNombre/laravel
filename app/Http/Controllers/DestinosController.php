<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\TrenDestino;

//Request
use App\Http\Requests\TrenDestinoRequest;

//Repositories
use App\Repositories\TrenDestinoRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\DestinosDataTable;

class DestinosController extends Controller
{

    public function index(DestinosDataTable $dataTable)
    {       
        return $dataTable->render('moduloMovimientoTrenes.destinos.listado');     
    }

    public function create()
    {
        return view('moduloMovimientoTrenes.destinos.crear');     
    }

    public function store(TrenDestinoRequest $request)
    {
        $input = $request->all();
        TrenDestino::create($input);
        flash('Destino <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $destino = TrenDestino::findOrFail($id);
        return view('moduloMovimientoTrenes.destinos.editar')->with('destino',$destino);     
    }

    public function update(TrenDestinoRequest $request, $id)
    {
        $destino -> fill($request->all());
        $destino -> save();
        flash('<b>'.$destino->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $destino = TrenDestino::findOrFail($id);
        $destino -> delete();
        flash('<b>'. $destino->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

}
