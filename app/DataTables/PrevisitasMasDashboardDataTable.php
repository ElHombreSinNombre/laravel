<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Visita;

//Facades
use Carbon;

class PreVisitasMasDashboardDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        $request = $this->request();
        $query->where('previsita',1);
        $previsitas = new EloquentDataTable($query);
        return $previsitas
            //Columna estado
            ->addColumn('estado', function ($previsitas) {
                return $previsitas->f_salida ?  '<a class="text-danger" data-toggle="tooltip" data-placement="top" title="Cambiar estado" href="' . route('dashboard.visitas.estado', [$previsitas->id]) . '"><strong>Salida</strong></a>': '<a class="text-success" data-toggle="tooltip" data-placement="top" title="Cambiar estado" href="' . route('dashboard.visitas.estado', [$previsitas->id]) . '"><strong>Entrada</strong></a>';
            })->rawColumns(['estado'])
            //Modificación de columnas    
            ->editColumn('f_entrada', function ($date) {
                return $date->f_entrada ? Carbon::parse($date->f_entrada)->format('d-m-Y h:i:s'): null;
            })
            ->editColumn('visitado_id', function ($visitado) {
                return $visitado->visitado->nombreapellido;
        });
    }

    public function query(Visita $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'f_entrada'   => ['title' => 'Fecha entrada','name'=>'f_entrada'],
                        'nombre'      => ['title' => 'Nombre' ,'name'=>'nombre'],
                        'empresa'     => ['title' => 'Empresa','name'=>'empresa'],
                        'visitado_id' => ['title' => 'Visitado','name'=>'visitado_id'],
                        'estado'      => ['title' => 'Estado','name'=>'estado', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
                    ])
                    ->parameters([
                        'order'      => [[0, 'desc']],
                        'dom'        => "<'row'<'col-xs-12'<'col-xs-6'l>B>><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i> <'col-xs-6'p>>>",
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
                        'url'     => route('dashboard.visitas.previsitas'),
                    ]);
            
    }

    protected function getColumns()
    {
        return [
            'id',
            'f_entrada',
            'nombre',
            'empresa',
            'visitado_id',
        ];
    }

    protected function filename()
    {
        return 'Listado de previsitas del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }

}
