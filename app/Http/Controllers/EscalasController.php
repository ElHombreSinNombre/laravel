<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Parametro;
use App\Models\Inventory;

//Facades
use Flash;
use Carbon;

//Datatable
use App\DataTables\EscalasLogsDataTable;
use App\DataTables\EscalasDataTable;

class EscalasController extends Controller
{

    public function index(EscalasLogsDataTable $dataTable)
    {                
        return $dataTable->render('moduloAdministracion.escalas.listado');     
    }

    public function create()
    {
        $escalas=Parametro::where('modulo','ESCALAS')->get();
        return view('moduloAdministracion.escalas.parametros')->with('escalas',$escalas);
    }

    public function update(Request $request, $id)
    {
        $escalas = Parametro::findOrFail($id);
        $escalas -> fill($request->all());
        $escalas -> save();
        flash('<b>'.$escalas->campo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function listado(Request $request, EscalasDataTable $dataTable)
    {
        if (!empty($request->all())){     
            $rango= explode(' a ',$request->rango);
            $from=Carbon::createFromFormat('d/m/Y H:i:s', $rango[0])->format('Y-m-d H:i:s');
            $to=Carbon::createFromFormat('d/m/Y H:i:s', $rango[1])->format('Y-m-d H:i:s');
            $buque= Inventory::whereBetween('trk_in_date', [$from,$to])->orderBy('vsl_cd','asc')->orderBy('call_year','desc')->orderBy('call_seq','asc')->get()->pluck('escalas','vsl_cd'); 
            if ($buque->count()>=1){
                flash('<b>'.$buque->count().'</b> buque/s encontrado/s entre <b>'.$rango[0].'</b> y <b>'.$rango[1].'</b>.', 'success');
            }else{
                flash('No se han encontrado buques entre <b>'.$rango[0].'</b> y <b>'.$rango[1].'</b>.', 'error');
            }
            return $dataTable->render('moduloEstadistica.escalas.listado', ['buque'=>$buque,'vsl_cd'=>$request->vsl_cd,'cntr_no'=>$request->cntr_no]);     
        }else{
            return view('moduloEstadistica.escalas.listado');
        }
    }

}
