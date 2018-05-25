<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\TrenMovimiento;

//Facades
use Carbon;

class MovimientosDataTable extends DataTable
{

    public function dataTable($query)
    {
        $movimientos = new EloquentDataTable($query);
        return $movimientos
            ->addColumn('action', function ($movimientos) {
                return 
                    '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('movimientos.edit', [$movimientos->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                    '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$movimientos->codigo.'" data-route="' . route('movimientos.delete', [$movimientos->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
                })
            ->editColumn('fecha', function ($date) {
                return $date->fecha ? Carbon::parse($date->fecha)->format('d-m-Y'): null;
            });    
    }

    public function query(TrenMovimiento $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'fecha' => ['title' => 'Fecha','name'=>'fecha'],
                        'tipo_movimiento' => ['title' => 'Tipo movimiento','name'=>'tipo_movimiento'],
                        'operador' => ['title' => 'Operador','name'=>'operador'],
                        'propietario' => ['title' => 'Propietario','name'=>'propietario'],
                        'numero_contenedores' => ['title' => 'Número contenedor','name'=>'numero_contenedores'],
                        'teus' => ['title' => 'Teu','name'=>'teus'],
                        'ciudad' => ['title' => 'Ciudad','name'=>'ciudad'],
                        'action' => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
                    ])
                    ->parameters([
                        'order'      => [[0, 'desc']],
                        'pagingType' => 'full_numbers',
                        'dom'        => "<'row'<'col-xs-12'<'col-xs-6'l>B>><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i> <'col-xs-6'p>>>",
                        'buttons'    => [
                            ['extend' => 'excel', 'text' => '<i class="fa fa-file-excel-o"></i> Exportar a Excel '],
                            ['separator'],
                            ['extend' => 'clean', 'text' => '<i class="fa fa-eraser"></i> Limpiar filtros']
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
                        'url'     => route('movimientos.listado'),
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'fecha',
            'tipo_movimiento',
            'operador',
            'propietario',
            'numero_contenedores',
            'teus',
            'ciudad',
        ];
    }

    protected function filename()
    {
        return 'Listado de movimientos del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
    
}
