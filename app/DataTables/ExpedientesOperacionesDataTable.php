<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\DepositoOperacion;

//Facades
use Carbon;

class ExpedientesOperacionesDataTable  extends DataTable
{

    public function dataTable($query)
    { 
        $query->where('expediente_id',$this->id);
        $expedientesOperaciones = new EloquentDataTable($query);
        return $expedientesOperaciones
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($expedientesOperaciones) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$expedientesOperaciones->expediente_id.'" data-route="' . route('operaciones.delete', [$expedientesOperaciones->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })
            //Modificación de columnas   
            ->editColumn('fecha', function ($date) {
                return $date->fecha ? Carbon::parse($date->fecha)->format('d-m-Y'): null;
            })
             ->editColumn('expediente_id', function ($expediente) {
                return $expediente->DepositoExpediente->codigo;
            }) 
            ->editColumn('cliente_id', function ($cliente) {
                return $cliente->DepositoCliente->nombre;
            })
            ->editColumn('tipo_operacion_id', function ($operacion) {
                return $operacion->DepositoTipoOperacion->nombre;
            })
            ->editColumn('tipo_documento_aduana_id', function ($aduana) {
                return $aduana->DepositoTipoOperacion->nombre;
        });
    }

    public function query(DepositoOperacion $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'expediente_id'            => ['title' => 'Código Exp.','name'=>'expediente_id'],
                        'fecha'                    => ['title' => 'Fecha','name'=>'fecha'],
                        'cliente_id'               => ['title' => 'Cliente','name'=>'cliente_id'],
                        'tipo_operacion_id'        => ['title' => 'T.Opera.','name'=>'tipo_operacion_id'],
                        'transporte'               => ['title' => 'Transporte','name'=>'transporte'],
                        'unidades'                 => ['title' => 'Unidades','name'=>'unidades'],
                        'importe'                  => ['title' => 'Peso','name'=>'importe'],
                        'tipo_documento_aduana_id' => ['title' => 'T.DUA','name'=>'tipo_documento_aduana_id'],
                        'num_documento_aduana'     => ['title' => 'Núm.DUA','name'=>'num_documento_aduana'],
                        'observaciones'            => ['title' => 'Observaciones','name'=>'observaciones'],
                        'action'                   => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
                    ])
                    ->parameters([
                        'order'      => [[0, 'desc']],
                        'pagingType' => 'full_numbers',
                        'dom'        => "<'row'<'col-xs-12'<'col-xs-6'l>B>><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i> <'col-xs-6'p>>>",
                        'buttons'    => [
                            ['extend' => 'excel', 'text' => '<i class="fa fa-file-excel-o"></i> Exportar a Excel'],
                            ['separator'],
                            ['extend' => 'pdf', 'text' => '<i class="fa fa-file-pdf-o"></i> Exportar a PDF'],
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
                        'url'     => route('expedientes.edit', [$this->id]) 
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'expediente_id',
            'fecha',
            'cliente_id',
            'tipo_operacion_id',
            'transporte',
            'unidades',
            'importe',
            'tipo_documento_aduana_id',
            'num_documento_aduana',
            'observaciones'
        ];
    }

    protected function filename()
    {
        return 'Listado de operaciones del expediente '.$this->id.' a fecha de ' .Carbon:: now()->format('d/m/Y H:i:s');
    }
    
}
