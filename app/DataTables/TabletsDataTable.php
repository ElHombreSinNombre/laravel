<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Tablet;

//Facades
use Carbon;

class TabletsDataTable extends DataTable
{
    public function dataTable($query)
    {
        $tablets = new EloquentDataTable($query);
        return $tablets 
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($tablets) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('tablets.edit', [$tablets->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$tablets->name.'" data-route="' . route('tablets.destroy', [$tablets->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            }); 
    }

    public function query(Tablet $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'name'    => ['title' => 'Nombre' ,'name'=>'name'],
                        'ubicacion' => ['title' => 'Ubicación','name'=>'ubicacion'],
                        'mac'       => ['title' => 'Mac','name'=>'mac'],
                        'action'    => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
                    ])
                    ->parameters([
                        'pagingType' => 'full_numbers',
                        'order'      => [[0, 'desc']],
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
                    ])->ajax([
                        'url'     => route('tablets.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.name    = $('input[name=nombre]').val();
                            d.ubicacion = $('input[name=ubicacion]').val();
                            d.mac       = $('select[name=mac]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'name',
            'ubicacion',
            'mac'
        ];
    }

    protected function filename()
    {
        return 'Listado de tablets' . Carbon:: now();
    }
    
}
