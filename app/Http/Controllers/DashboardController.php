<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Visita;

//Facades
use Flash;
use Carbon;
use Datatables;

//Datatable
use App\DataTables\VisitasDashboardDataTable;
use App\DataTables\VisitasMasDashboardDataTable;
use App\DataTables\PrevisitasMasDashboardDataTable;
use App\DataTables\VisitantesActivosDataTable;
use App\DataTables\VisitantesEntranHoyDataTable;
use App\DataTables\VisitantesSalenHoyDataTable;

class DashboardController extends Controller
{
    
    public function indexVisita(VisitasDashboardDataTable $dataTable)
    {
        $activos= Visita::whereNotNull('f_entrada')->whereNull('f_salida')->where('previsita',0)->count();
        $salen  = Visita::whereYear('f_salida',Carbon::now()->year)->whereMonth('f_salida',Carbon::now()->month)->whereDay('f_salida',Carbon::now()->day)->count();
        $entran  = Visita::whereYear('f_entrada',Carbon::now()->year)->whereMonth('f_salida',Carbon::now()->month)->whereDay('f_salida',Carbon::now()->day)->count();
        return $dataTable->render('moduloVisitas.dashboard.listado',compact('activos','salen','entran'));    
    }

    public function indexPrevisita(Request $request)
    {
        $previsitas=Visita::where('previsita',1);
        return Datatables::of($previsitas) 
            //Columna estado
            ->addColumn('estado', function ($previsitas) {
                return $previsitas->previsita ? '<a class="text-success" data-toggle="tooltip" data-placement="top" title="Cambiar estado" href="' . route('dashboard.visitas.estado', [$previsitas->id]) . '"><strong>Entrada</strong></a>' :  '<a class="text-danger" data-toggle="tooltip" data-placement="top" title="Cambiar estado" href="' . route('dashboard.visitas.estado', [$previsitas->id]) . '"><strong>Salida</strong></a>';
            })->rawColumns(['estado'])
            //Modificación de columnas    
            ->editColumn('f_entrada', function ($date) {
                return $date->f_entrada ? Carbon::parse($date->f_entrada)->format('d-m-Y h:i:s'): '';
            })
            ->editColumn('visitado_id', function ($visitado) {
                return $visitado->visitado_id ? $visitado->visita_visitado->nombreapellidos: '';
        })  
        -> make(true);
    }

    public function estado($id){
        $visita = Visita::find($id);
        if($visita->f_salida==null){
            $visita->previsita = 0;
        }else{
            $visita->previsita = 1;  
            $visita->f_salida  = null; 
            $visita->f_entrada = Carbon::now()->format('Y-m-d h:i:s');
        }
        $visita->save();
        flash('<b>'.$visita->nombre.' </b>ha cambiado su estado de forma satisfactoria.', 'success');
        return Redirect:: back();
    }

    public function activos(VisitantesActivosDataTable $dataTable)
    {
        return $dataTable->render('moduloVisitas.dashboard.resumen.activos');    
    }

    public function hoySalen(VisitantesSalenHoyDataTable $dataTable)
    {   
        return $dataTable->render('moduloVisitas.dashboard.resumen.hoySalida');    
    }

    public function hoyEntran(VisitantesEntranHoyDataTable $dataTable)
    {   
        return $dataTable->render('moduloVisitas.dashboard.resumen.hoyEntrada');     
    }

    public function visitantes(VisitasMasDashboardDataTable $dataTable)
    {   
        return $dataTable->render('moduloVisitas.dashboard.resumen.visitantes');     
    }

    public function previsitas(PrevisitasMasDashboardDataTable $dataTable)
    {   
        return $dataTable->render('moduloVisitas.dashboard.resumen.previsitas');     
    }

}
