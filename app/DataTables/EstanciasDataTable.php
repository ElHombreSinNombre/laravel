<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Inventory;

//Facades
use Carbon;
use DB;

class EstanciasDataTable extends DataTable
{
 
    public function dataTable($query)
    {
        $request = $this->request();
        $query->select('agent_code','in_date','cntr_no','vsl_cd','call_year','call_seq', DB::raw("ROUND (TO_DATE('". Carbon::parse($request->get('hasta_fecha'))->format('Y-m-d h:i:s'). "','YYYY-MM-DD HH24:Mi:SS') - IN_DATE ,0) as diferencia"))->where('FE','F')->where('COMMUNITY','Y')->where('DISPATCH_MODE','VY');
        $estancias = new EloquentDataTable($query);
        return $estancias
            //Modificación de columnas    
            ->editColumn('in_date', function ($date) {
                return $date->in_date ? Carbon::parse($date->in_date)->format('d-m-Y h:i:s'): null;
            })
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('mayor')=='30')) {
                    $query->whereRaw("TO_DATE('". Carbon::parse($request->get('hasta_fecha'))->format('Y-m-d h:i:s'). "','YYYY-MM-DD HH24:Mi:SS') - IN_DATE >= 30 and TO_DATE('". Carbon::parse($request->get('hasta_fecha'))->format('Y-m-d h:i:s'). "','YYYY-MM-DD HH24:Mi:SS') - IN_DATE < 60");      
                }
                if (!empty($request->get('mayor')=='60')) {
                    $query->whereRaw("TO_DATE('". Carbon::parse($request->get('hasta_fecha'))->format('Y-m-d h:i:s'). "','YYYY-MM-DD HH24:Mi:SS') - IN_DATE >= 60 and TO_DATE('". Carbon::parse($request->get('hasta_fecha'))->format('Y-m-d h:i:s'). "','YYYY-MM-DD HH24:Mi:SS') - IN_DATE < 90");
                }
                if (!empty($request->get('mayor')=='90')) {
                    $query->whereRaw("TO_DATE('". Carbon::parse($request->get('hasta_fecha'))->format('Y-m-d h:i:s'). "','YYYY-MM-DD HH24:Mi:SS') - IN_DATE>= 90");
                }
            });
    }

    public function query(Inventory $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'agent_code' => ['title' => 'Agent Code','name'=>'agent_code'],
                        'in_date'    => ['title' => 'In Date','name'=>'in_date'],
                        'cntr_no'    => ['title' => 'Cntr No' ,'name'=>'cntr_no'],
                        'vsl_cd'     => ['title' => 'Vsl' ,'name'=>'vsl_cd'],
                        'call_year'  => ['title' => 'Call Year' ,'name'=>'call_year'],
                        'call_seq'   => ['title' => 'Call Seq' ,'name'=>'call_seq'],
                        'diferencia' => ['title' => 'Diferencia','name'=>'diferencia'],
                    ])
                    ->parameters([
                        'order'      => [[0, 'desc']],
                        'pagingType' => 'full_numbers',
                        'dom'        => "<'row'<'col-xs-12'<'col-xs-6'l>B>><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i> <'col-xs-6'p>>>",
                        'buttons'    => [
                            ['extend' => 'excel', 'text' => '<i class="fa fa-file-excel-o"></i> Exportar a Excel'],
                            ['separator'],
                            ['extend' => 'clean', 'text' => '<i class="fa fa-eraser"></i> Limpiar filtros'],
                        ],               
                        'processing' => true,
                        'serverSide' => true,
                        'responsive' => true,
                        'searching'  => false,
                        "language"   => [
                            "sProcessing"     => "Procesando...",
                            "sLengthMenu"     => "Mostrar _MENU_ registros.",
                            "sZeroRecords"    => "No se encontraron resultados.",
                            "sEmptyTable"     => "Ningún dato disponible en esta tabla.",
                            "sInfo"           => "Mostrando registros del <b>_START_ al _END_</b> de un total de <b>_TOTAL_</b> registros.",
                            "sInfoEmpty"      => "Mostrando registros del 0 al 0 de un total de 0 registros.",
                            "sInfoFiltered"   => "<br/>Filtrado de un total de <b>_MAX_</b> registros.",
                            "sInfoPostFix"    => "",
                            "sSearch"         => "Buscar:",
                            "sUrl"            => "",
                            "sInfoThousands"  => ",",
                            "sLoadingRecords" => "Cargando...",
                            "oPaginate"       => [
                                "sFirst"    => "<span data-toggle='tooltip' data-placement='top' title='Primero' class='glyphicon glyphicon-fast-backward'></span>",
                                "sLast"     => "<span data-toggle='tooltip' data-placement='top' title='Último' class='glyphicon glyphicon-fast-forward'></span>",
                                "sNext"     => "<span data-toggle='tooltip' data-placement='top' title='Siguiente' class='glyphicon glyphicon-step-forward'></span>",
                                "sPrevious" => "<span data-toggle='tooltip' data-placement='top' title='Atrás' class='glyphicon glyphicon-step-backward'></span>",
                            ],
                            "oAria"=> [
                                "sSortAscending"  => "=> Activar para ordenar la columna de manera <b>ascendente</b>",
                                "sSortDescending" => "=> Activar para ordenar la columna de manera <b>descendente</b>"
                            ]
                        ]
                    ])
                    ->ajax([
                        'url'     => route('estancias.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.hasta_fecha = $('input[name=hasta_fecha]').val();
                            d.mayor       = $('select[name=mayor]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'agent_code',
            'in_date',
            'cntr_no',
            'vsl_cd',
            'call_year',
            'call_seq',
            'diferencia'
        ];
    }

    protected function filename()
    {
        return 'Listado de estancias del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }

}
