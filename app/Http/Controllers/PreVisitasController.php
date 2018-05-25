<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Visita;
use App\Models\Visitado;

//Request
use App\Http\Requests\VisitaRequest;

//Repositories
use App\Repositories\VisitaRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\PrevisitasDataTable;

class PreVisitasController extends Controller
{
 
    public function index(PrevisitasDataTable $dataTable)
    {
        return $dataTable->render('moduloVisitas.previsitas.listado',$this->selects());   
    }

    public function selects()
    {
        return [    
            'nombreVisitado' => Visitado::select('nombreapellidos','id')->orderBy('nombreapellidos','asc')->pluck('nombreapellidos','id')->prepend('', ''),
        ];
    }

    public function create()
    {
        return view('moduloVisitas.previsitas.crear')->with($this->selects());   
    }

    public function store(VisitaRequest $request)
    {
        $input = $request->all();
        if ($request->f_entrada){
            $input['f_entrada']=Carbon::createFromFormat('d-m-Y H:i:s',$request['f_entrada'])->format('Y-m-d');
        }
        if ($request->f_final){
            $input['f_salida']=Carbon::createFromFormat('d-m-Y H:i:s',$request['f_salida'])->format('Y-m-d');
        }
        Visita::create($input,['previsita'=>1]);
        flash('Previsita <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $previsita = Visita::findOrFail($id);
        return view('moduloVisitas.previsitas.editar')->with('previsita',$previsita)->with($this->selects());   
    }

    public function update(VisitaRequest $request, $id)
    {
        $previsita = Visita::findOrFail($id);
        if ($request->f_entrada){
            $input['f_entrada']=Carbon::createFromFormat('d-m-Y H:i:s',$request['f_entrada'])->format('Y-m-d');
        }
        if ($request->f_final){
            $input['f_salida']=Carbon::createFromFormat('d-m-Y H:i:s',$request['f_salida'])->format('Y-m-d');
        }
        $previsita -> fill($request->all());
        $previsita -> save();
        flash('<b>'.$previsita->codigo.'</b> modificada de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $previsita = Visita::findOrFail($id);
        $previsita -> delete();
        flash('<b>'. $previsita->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

}
