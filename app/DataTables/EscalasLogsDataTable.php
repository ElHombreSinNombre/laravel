<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\EscalaLog;

//Facades
use Carbon;

class EscalasLogsDataTable extends DataTable
{

    public function dataTable($query)
    {
        $escalalog = new EloquentDataTable($query);
        return $escalalog
           //Modificación de columnas    
           ->editColumn('fecha', function ($date) {
            return $date->fecha ? Carbon::parse($date->fecha)->format('d-m-Y'): null;
        });
    }

    public function query(EscalaLog $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {  
        return $this->builder()
                    ->columns([
                        'fecha'          => ['title' => 'Fecha','name'=>'fecha'],
                        'texto'          => ['title' => 'Texto' ,'name'=>'texto'],
                        'tema'           => ['title' => 'Tema','name'=>'tema'],
                        'nombre'         => ['title' => 'Nombre','name'=>'nombre'],
                        'de'             => ['title' => 'De','name'=>'de'],
                        'para'           => ['title' => 'Para','name'=>'para'],
                        'estado'         => ['title' => 'Estado','name'=>'estado'],
                        'observaciones'  => ['title' => 'Observaciones','name'=>'observaciones'],
                        'out_voyage'     => ['title' => 'Out voyage','name'=>'out_voyage'],
                        'imo'            => ['title' => 'IMO','name'=>'imo'],
                        'barco'          => ['title' => 'Barco','name'=>'barco'],
                        'eta'            => ['title' => 'ETA','name'=>'eta'],
                        'out_voyage_old' => ['title' => 'Out voyage old','name'=>'out_voyage_old'],
                    ])
                    ->parameters([
                        'order'      => [[0, 'desc']],
                        'pagingType' => 'full_numbers',
                        'dom'        => "<'row'<'col-xs-12'<'col-xs-6'l>B>><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i> <'col-xs-6'p>>>",
                        'buttons'    => [
                            ['extend' => 'excel', 'text' => '<i class="fa fa-file-excel-o"></i> Exportar a Excel '],
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
                        'url'     => route('escalas.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                    ]);                  
    }

    protected function getColumns()
    {
        return [
            "fecha",
            "texto",
            "tema",
            "nombre",
            "de",
            "para",
            "estado",
            "observaciones",
            "out_voyage",
            "imo",
            "barco",
            "eta",
            "out_voyage_old",
        ];
    }

    protected function filename()
    {
        return 'Listado de logs escalas del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
}
