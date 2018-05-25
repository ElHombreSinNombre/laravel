<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Corte;

//Request
use App\Http\Requests\CorteRequest;

//Repositories
use App\Repositories\CorteRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\CortesDataTable;

class CorteController extends Controller
{

    public function index(CortesDataTable $dataTable)
    {
        return $dataTable->render('moduloUtilidades.cortes.listado');     
    }

    public function create()
    {
        return view('moduloUtilidades.cortes.crear');   
    }

    public function store(CorteRequest $request)
    {
        $input = $request->all();
        if ($request->f_entrada){
            $input['f_entrada']=Carbon::createFromFormat('d-m-Y',$request['f_entrada'])->format('Y-m-d');
        }
        if ($request->f_final){
            $input['f_final']=Carbon::createFromFormat('d-m-Y',$request['f_final'])->format('Y-m-d');
        }
        Corte::create($input);
        flash('Corte <b>'. $input['tipo'].' </b>grabado de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function edit($id)
    {
        $corte = Corte::findOrFail($id);
        return view('moduloUtilidades.cortes.editar')->with('corte',$corte);   
    }

    public function update(CorteRequest $request, $id)
    {
        $corte = Corte::findOrFail($id);
        if ($request->f_entrada){
            $input['f_entrada']=Carbon::createFromFormat('d-m-Y',$request['f_entrada'])->format('Y-m-d');
        }
        if ($request->f_final){
            $input['f_final']=Carbon::createFromFormat('d-m-Y',$request['f_final'])->format('Y-m-d');
        }
        $corte -> fill($request->all());
        $corte -> save();
        flash('<b>'.$corte->tipo.'</b> modificada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function destroy($id)
    {
        $corte = Corte::findOrFail($id);
        $corte -> delete();
        flash('<b>'. $corte->tipo .'</b> eliminada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

}
