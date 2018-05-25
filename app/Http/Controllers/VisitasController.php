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
use App\DataTables\VisitasDataTable;

class VisitasController extends Controller
{

    public function index(VisitasDataTable $dataTable)
    {
        return $dataTable->render('moduloVisitas.visitas.listado',$this->selects());   
    }

    public function selects()
    {
        return [    
            'nombreVisitado' => Visitado::select('nombreapellidos','id')->orderBy('nombreapellidos','asc')->pluck('nombreapellidos','id')->prepend('', ''),
        ];
    }

    public function create()
    {
        return view('moduloVisitas.visitas.crear')->with($this->selects());   
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
        Visita::create($input,['previsita'=>0]);
        /*$visitados = Visitado::all();
        foreach ($visitados as $visitado){
            if(!empty($visitado->email)){
                Mail::to($visitado->email.'@noatum.com')->from()->send(new Visitas($input));
            }
            if(!empty($visitado->email2)){
                Mail::to($visitado->email2.'@noatum.com')->from()->send(new Visitas($input));
            }
        }*/
        flash('Visita <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function edit($id)
    {
        $visita = Visita::findOrFail($id);
        return view('moduloVisitas.visitas.editar')->with('visita',$visita)->with($this->selects());   
    }

    public function update(VisitaRequest $request, $id)
    {
        $visita = Visita::findOrFail($id);
        if ($request->f_entrada){
            $input['f_entrada']=Carbon::createFromFormat('d-m-Y H:i:s',$request['f_entrada'])->format('Y-m-d');
        }
        if ($request->f_final){
            $input['f_salida']=Carbon::createFromFormat('d-m-Y H:i:s',$request['f_salida'])->format('Y-m-d');
        }
        $visita -> fill($request->all());
        $visita -> save();
        flash('<b>'.$visita->codigo.'</b> modificada de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function destroy($id)
    {
        $visita = Visita::findOrFail($id);
        $visita -> delete();
        flash('<b>'. $visita->codigo .'</b> eliminado de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

}
