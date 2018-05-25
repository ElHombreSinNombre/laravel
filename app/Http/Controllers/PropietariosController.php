<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Request
use App\Http\Requests\TrenDestinoRequest;

//Repositories
use App\Repositories\TrenDestinoRepository;

//Models
use App\Models\TrenPropietario;

//Facades
use Flash;

//Datatable
use App\DataTables\PropietariosDataTable;

class PropietariosController extends Controller
{

    public function index(PropietariosDataTable $dataTable)
    {                
        return $dataTable->render('moduloMovimientoTrenes.propietarios.listado');     
    }

    public function create()
    {
        return view('moduloMovimientoTrenes.propietarios.crear');     
    }

    public function store(TrenDestinoRepository $request)
    {
        $input = $request->all();
        TrenPropietario::create($input);
        flash('Siniestro <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $propietario = TrenPropietario::findOrFail($id);
        return view('moduloMovimientoTrenes.propietarios.editar')->with('propietario',$propietario);     
    }

    public function update(TrenDestinoRepository $request, $id)
    {
        $propietario -> fill($request->all());
        $propietario -> save();
        flash('<b>'.$propietario->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $propietario = TrenPropietario::findOrFail($id);
        $propietario -> delete();
        flash('<b>'. $propietario->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

}
