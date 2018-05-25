<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\DepositoIntermediario;
use App\Models\DepositoCliente;
use App\Models\DepositoTipoDocAduana;
use App\Models\DepositoExpediente;
use App\Models\DepositoOperacion;
use App\Models\DepositoTipoOperacion;
use App\Models\DepositoTipoUnidad;

//Request
use App\Http\Requests\ExpedienteRequest;

//Repositories
use App\Repositories\ExpedienteRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\ExpedientesDataTable;
use App\DataTables\ExpedientesOperacionesDataTable;

class ExpedientesController extends Controller
{

    public function index(ExpedientesDataTable $dataTable)
    {                
        return $dataTable->render('moduloDepositoAduanero.expedientes.listado',$this->selects());     
    }

    public function create()
    {
        $codigo=DepositoExpediente::max('codigo');
        return view('moduloDepositoAduanero.expedientes.crear')->with($this->selects())->with('codigo',$codigo);
    }

    public function store(ExpedienteRequest $request)
    {
        $input = $request->all();
        if ($request->fecha_apertura){
            $input['fecha_apertura']=Carbon::createFromFormat('d-m-Y',$request['fecha_apertura'])->format('Y-m-d');
        }
        DepositoExpediente:: create($input);
        flash('Expediente <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function edit($id, ExpedientesOperacionesDataTable $dataTable)
    {
        $operacion  = DepositoOperacion::where('expediente_id',$id)->get();
        $expediente = DepositoExpediente::findOrFail($id);
        return $dataTable->with('id',$id)->render('moduloDepositoAduanero.expedientes.editar',$this->selects(),['operacion'=>$operacion,'expediente'=>$expediente]);     
    }

    public function update(ExpedienteRequest $request, $id)
    {
        $expediente = DepositoExpediente::findOrFail($id);
        if ($request->fecha_apertura){
            $input['fecha_apertura']=Carbon::createFromFormat('d-m-Y',$request['fecha_apertura'])->format('Y-m-d');
        }
        $expediente -> fill($request->all());
        $expediente -> save();
        flash('<b>'.$expediente->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function destroy($id)
    {
        $expediente = DepositoExpediente::findOrFail($id);
        $expediente -> delete();
        flash('<b>'. $expediente->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function selects()
    {
        return [
            'nombreIntermediario' => DepositoIntermediario::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'nombreCliente'       => DepositoCliente::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'tipoDocumento'       => DepositoTipoDocAduana::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'tipoOperacion'       => DepositoTipoOperacion::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'tipoUnidad'          => DepositoTipoUnidad::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
        ];
    }

}
