<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Priagelin;

//Facades
use Carbon;

class PriagelinesDataTable extends DataTable
{
  
    public function dataTable($query)
    {
        $request = $this->request();
        $priagelin = new EloquentDataTable($query);
        return $priagelin
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($priagelin) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('priagelines.edit', [$priagelin->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$priagelin->principal.'" data-route="' . route('priagelines.delete', [$priagelin->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })   
            //Modificación de columnas    
            ->editColumn('desde', function ($hasta) {
                return $hasta->desde  == '1' ? '...el principio': '... el final';
            })     
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('modulo'))) {
                    $query->where('modulo', "{$request->get('modulo')}");          
                }
                if (!empty($request->get('cliente'))) {
                    $query->where('cliente', 'like', "%{$request->get('cliente')}%");          
                }
            });
    }
 
    public function query(Priagelin $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'modulo' => ['title' => 'Módulo','name'=>'modulo'],
                        'cliente' => ['title' => 'Cliente','name'=>'cliente'],
                        'principal' => ['title' => 'Principal','name'=>'principal'],
                        'agente' => ['title' => 'Agente','name'=>'agente'],
                        'linea' => ['title' => 'Línea','name'=>'linea'],
                        'buscar' => ['title' => 'Buscar','name'=>'buscar'],
                        'caracteres' => ['title' => 'Caracteres','name'=>'caracteres'],
                        'desde' => ['title' => 'Desde','name'=>'desde'],
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
                        'url'     => route('priagelines.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.cliente = $('input[name=cliente]').val();
                            d.modulo  = $('input[name=modulo]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'modulo',
            'cliente',
            'principal',
            'agente',
            'linea',
            'buscar',
            'caracteres',
            'desde'
        ];
    }

    protected function filename()
    {
        return 'Listado de priagelines del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }

}
