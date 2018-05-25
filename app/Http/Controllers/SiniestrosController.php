<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Siniestro;
use App\Models\SiniestroReclamante;
use App\Models\SiniestroDanio;
use App\Models\Maquina;
use App\Models\TipoOperativa;
use App\Models\TipoObjetoSiniestro;
use App\Models\TipoPoliza;

//Request
use App\Http\Requests\SiniestroRequest;

//Repositories
use App\Repositories\SiniestroRepository;

//Facades
use Carbon;
use Flash;
use Excel;

//Datatable
use App\DataTables\SiniestrosDataTable;
use App\DataTables\InformesDataTable;

class SiniestrosController extends Controller
{

    public function index(SiniestrosDataTable $dataTable)
    {                
        return $dataTable->render('moduloSiniestros.siniestros.listado',$this->selects());     
    }

    public function create()
    {
        return view('moduloSiniestros.siniestros.crear')->with($this->selects());     
    }

    public function store(SiniestroRequest $request)
    { 
        $input = $request->all();
        if ($request->fecha_recepcion){
            $input['fecha_recepcion']=Carbon::createFromFormat('d-m-Y',$request['fecha_recepcion'])->format('Y-m-d');
        }
        if ($request->fecha_siniestro){
            $input['fecha_siniestro']=Carbon::createFromFormat('d-m-Y',$request['fecha_siniestro'])->format('Y-m-d');
        }
        Siniestro::create($input);
        flash('Siniestro <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $siniestro = Siniestro::findOrFail($id);
        $reclamantes = Siniestroreclamante::select('siniestro_reclamante.id', 'reclamante.nombre','siniestro_reclamante.observaciones')->where('siniestro_reclamante.siniestro_id', $id)->leftJoin('reclamante', 'reclamante.id', '=', 'siniestro_reclamante.reclamante_id')->get();
        $danios = SiniestroDanio::select('siniestro_danio.ID', 'tipo_elemento_daniado.nombre','siniestro_danio.observaciones')->where('siniestro_danio.siniestro_id', $id)->leftJoin('tipo_elemento_daniado', 'tipo_elemento_daniado.id', '=', 'siniestro_danio.tipo_elemento_daniado_id')->get();
        return view('moduloSiniestros.siniestros.editar')->with('siniestro',$siniestro)->with('reclamantes',$reclamantes)->with('danios',$danios)->with($this->selects());
    }

    public function update(SiniestroRequest $request, $id)
    {
        $siniestro = Siniestro::findOrFail($id);
        if ($request->fecha_recepcion){
            $input['fecha_recepcion']=Carbon::createFromFormat('d-m-Y',$request['fecha_recepcion'])->format('Y-m-d');
        }
        if ($request->fecha_siniestro){
            $input['fecha_siniestro']=Carbon::createFromFormat('d-m-Y',$request['fecha_siniestro'])->format('Y-m-d');
        }
        $siniestro -> fill($request->all());
        $siniestro -> save();
        flash('<b>'.$siniestro->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $siniestro = Siniestro::findOrFail($id);
        $siniestro -> delete();
        flash('<b>'. $siniestro->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function informes(informesDataTable $dataTable)
    {                
        return $dataTable->render('moduloSiniestros.siniestros.informes',$this->selects());     
    }
   
    public function selects()
    {
        return [    
            'nombreOperativa' => TipoOperativa::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'nombreObjeto'    => TipoObjetoSiniestro::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'nombrePoliza'    => TipoPoliza::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', ''),
            'nombreMaquina'   => Maquina::select('nombre','id')->orderBy('nombre','asc')->pluck('nombre','id')->prepend('', '')
        ];
    }     

    public function excelPorSiniestro($id)
    { 
        $siniestro = Siniestro::find($id);
        $reclamantes = Siniestroreclamante::select('siniestro_reclamante.id', 'reclamante.nombre','siniestro_reclamante.observaciones')->where('siniestro_reclamante.siniestro_id', $id)->leftJoin('reclamante', 'reclamante.id', 'siniestro_reclamante.reclamante_id')->get();
        $danios = SiniestroDanio::select('siniestro_danio.id', 'tipo_elemento_daniado.nombre','siniestro_danio.observaciones')->where('siniestro_danio.siniestro_id', $id)->leftJoin('tipo_elemento_daniado', 'tipo_elemento_daniado.id', 'siniestro_danio.tipo_elemento_daniado_id')->get();  
        Excel::create('Lista del siniestro del '. Carbon::now()->format('d/m/Y'), function($excel) use ($siniestro,$reclamantes,$danios) {
        $excel->setTitle('Lista del siniestro del '.Carbon::now()->format('d/m/Y'));
            $excel->sheet('Hoja 1', function($sheet) use ($siniestro,$reclamantes,$danios){
                $sheet->appendRow(1, ['Código','Fecha recepción','Fecha siniestro','Pago previsto','Pago seguro','Pago realizado','Descripción','Notas','Ruta de la documentación', 'nombre de la operativa','Tipo de objeto','Tipo de póliza','nombre de máquina']);
                $sheet->appendRow(
                    [
                        $siniestro->codigo,
                        Carbon::parse($siniestro->fecha_recepcion)->format('d-m-Y'),
                        Carbon::parse($siniestro->fecha_siniestro)->format('d-m-Y'),
                        $siniestro->pago_previsto."€",
                        $siniestro->pago_seguro."€",
                        $siniestro->pago_realizado."€",           
                        $siniestro->descripcion, 
                        $siniestro->notas,
                        $siniestro->path_documentacion,
                        isset($siniestro->siniestro_operativa->nombre) ? $siniestro->siniestro_operativa->nombre : '',                     
                        isset($siniestro->siniestro_objeto->nombre) ? $siniestro->siniestro_objeto->nombre : '',
                        isset($siniestro->siniestro_poliza->nombre) ? $siniestro->siniestro_poliza->nombre : '',
                        isset($siniestro->siniestro_maquina->nombre) ? $siniestro->siniestro_maquina->nombre : '',  
                    ]     
                );
                $sheet->appendRow(['']);
                $sheet->appendRow( ['Reclamantes', 'Observaciones']);
                foreach ($reclamantes as $reclamante) {
                    $sheet->appendRow(
                        [
                            $reclamante->nombre,
                            $reclamante->observaciones,
                        ]
                    );
                }
                $sheet->appendRow(['']);
                $sheet->appendRow( ['Elementos Dañados','Observaciones']);
                foreach ($danios as $danio) {
                    $sheet->appendRow(
                        [
                            $danio->nombre,
                            $danio->observaciones,
                        ]
                    );
                }
            });
        })->export('xls');
    }

}
