<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\DepositoOperacion;
use App\Models\DepositoExpediente;
use App\Models\DepositoCliente;
use App\Models\DepositoTipoDocAduana;
use App\Models\DepositoTipoUnidad;
use App\Models\DepositoTipoOperacion;

//Request
use App\Http\Requests\OperacionRequest;

//Repositories
use App\Repositories\OperacionRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\OperacionesDataTable;

class OperacionesController extends Controller
{

    public function index(OperacionesDataTable $dataTable)
    {         
        return $dataTable->render('moduloDepositoAduanero.operaciones.listado',$this->selects());     
    }

    public function create($id)
    {
        $operacion = DepositoOperacion::where('expediente_id',$id)->first();
        $expediente = DepositoExpediente::findOrFail($id);
        return view('moduloDepositoAduanero.operaciones.crear')->with('operacion',$operacion)->with('expediente',$expediente)->with($this->selects());
    }

    public function store(OperacionRequest $request)
    {
        $expediente = DepositoExpediente::where('codigo',$request->expediente_codigo)->first();
        $operacion = DepositoOperacion::where('expediente_id',$expediente->id)->first();
        $request->expediente_id = $operacion->expediente_id;
        if ($request->fecha){
            $input['fecha']=Carbon::createFromFormat('d-m-Y',$request['fecha'])->format('Y-m-d');
        }
        DepositoOperacion:: create($request->all());
        flash('Operacion <b>'. $request['id'].' </b>grabada de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function edit($id)
    {
        $operacion = DepositoOperacion::findOrFail($id);
        $expediente = DepositoExpediente::find($operacion->expediente_id);
        if(!$expediente){
            $expediente=null;
        }
        return view('moduloDepositoAduanero.operaciones.editar')->with('operacion',$operacion)->with('expediente',$expediente)->with($this->selects());
    }

    public function update(OperacionRequest $request, $id)
    {
        $operacion = DepositoOperacion::findOrFail($id);
        if ($request->fecha){
            $input['fecha']=Carbon::createFromFormat('d-m-Y',$request['fecha'])->format('Y-m-d');
        }
        $operacion -> fill($request->except(['intermediario_id']));
        $operacion -> save();
        $expediente = DepositoExpediente::findOrFail($operacion->expediente_id);
        $expediente->intermediario_id=$request->intermediario->id;
        $expediente -> save();
        flash('<b>'.$operacion->id.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function destroy($id)
    {
        $operacion = DepositoOperacion::findOrFail($id);
        $operacion -> delete();
        flash('<b>'. $operacion->id .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function selects()
    {
        return [
            'tipoUnidad'    => DepositoTipoUnidad::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'tipoDocumento' => DepositoTipoDocAduana::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'nombreCliente' => DepositoCliente::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'tipoOperacion' => DepositoTipoOperacion::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
        ];
    }
    
}
