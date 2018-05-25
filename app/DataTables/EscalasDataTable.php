<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Inventory;

//Facades
use Carbon;

class EscalasDataTable extends DataTable
{

    public function dataTable($query)
    {
        $request = $this->request();
        $escala  = new EloquentDataTable($query);
        return $escala
            //Modificación de columnas    
            ->editColumn('trk_in_date', function ($date) {
                return $date->trk_in_date ? Carbon:: parse($date->trk_in_date)->format('d-m-Y'): null;
            })
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('cntr_no'))) {
                    $query->where('cntr_no', 'like', "%{$request->get('cntr_no')}%");          
                }
                if (!empty($request->get('vsl_cd'))) {
                    $query->where('vsl_cd', "{$request->get('vsl_cd')}");          
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
                        'agent_code'  => ['title' => 'Agent Code','name'=>'agent_code'],
                        'trk_in_date' => ['title' => 'Trk In Date','name'=>'trk_in_date'],
                        'vsl_cd'      => ['title' => 'Vsl Cd' ,'name'=>'vsl_cd'],
                        'call_year'   => ['title' => 'Call Year','name'=>'call_year'],
                        'call_seq'    => ['title' => 'Call Seq','name'=>'call_seq'],
                    ])
                    ->parameters([
                        'order'      => [[0, 'desc']],
                        'pagingType' => 'full_numbers',
                        'dom'        => "<'row'<'col-xs-12'<'col-xs-6'l>B>><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i> <'col-xs-6'p>>>",
                        'buttons'    => [
                            ['extend' => 'excel', 'text' => '<i class="fa fa-file-excel-o"></i> Exportar a Excel '],
                            ['separator'],
                            ['extend' => 'clean', 'text' => '<i class="fa fa-eraser"></i> Limpiar filtros'],
                        ],               
                        'processing' => true,
                        'serverSide' => true,
                        'responsive' => true,
                        'searching'  => false,
                        'scrollX'    => true,
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
                        'url'     => route('estadisticas.escalas.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.cntr_no = $('input[name=cntr_no]').val();
                            d.vsl_cd  = $('select[name=vsl_cd]').val();
                        }"
                    ]);                  
    }

    protected function getColumns()
    {
        return [
            "trk_in_date",
            "vsl_cd",
            "call_year",
            "call_seq",
            "cntr_no",
            "agent_code",
        ];
    }

    protected function filename()
    {
        return 'Listado de escalas del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
}
