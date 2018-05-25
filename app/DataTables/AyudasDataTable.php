<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Ayuda;

//Facades
use Carbon;

class AyudasDataTable extends DataTable
{
 
    public function dataTable($query)
    {
        $request  = $this->request();
        $ayudas = new EloquentDataTable($query);
        return $ayudas
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($ayudas) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('ayudas.edit', [$ayudas->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$ayudas->modulo.'" data-route="' . route('ayudas.delete', [$ayudas->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('modulo'))) {
                    $query->where('modulo', "{$request->get('modulo')}");          
                }
                if (!empty($request->get('grupo'))) {
                    $query->where('grupo', "{$request->get('grupo')}");          
                }
                if (!empty($request->get('opcion'))) {
                    $query->where('opcion', "{$request->get('opcion')}");          
                }
                if (!empty($request->get('subopcion'))) {
                    $query->where('subopcion', "{$request->get('subopcion')}");          
                }
            });
    }

    public function query(Ayuda $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'modulo'     => ['title' => 'Módulo','name'=>'modulo'],
                        'grupo'      => ['title' => 'Grupo' ,'name'=>'grupo'],
                        'opcion'     => ['title' => 'Opción' ,'name'=>'opcion'],
                        'subopcion'  => ['title' => 'Subopción','name'=>'subopcion'],
                        'action'     => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
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
                        'url'     => route('ayudas.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.grupo     = $('input[name=grupo]').val();
                            d.modulo    = $('input[name=modulo]').val();
                            d.opcion    = $('input[name=opcion]').val();
                            d.subopcion = $('input[name=subopcion]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'grupo',
            'modulo',
            'opcion',
            'subopcion'
        ];
    }

    protected function filename()
    {
        return 'Listado de ayudas del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }

}
