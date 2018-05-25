<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Corte;

//Facades
use Carbon;

class CortesDataTable extends DataTable
{
 
    public function dataTable($query)
    {
        $request  = $this->request();
        $cortes = new EloquentDataTable($query);
        return $cortes
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($cortes) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('cortes.edit', [$cortes->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$cortes->tipo.'" data-route="' . route('cortes.delete', [$cortes->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })
            //Modificación de columnas    
            ->editColumn('f_comienzo', function ($date) {
                return $date->f_comienzo ? Carbon::parse($date->f_comienzo)->format('d-m-Y'): null;
            })
            ->editColumn('f_final', function ($date) {
                return $date->f_final ? Carbon::parse($date->f_final)->format('d-m-Y'): null;
            })
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('usuario'))) {
                    $query->where('usuario', 'like', "%{$request->get('usuario')}%");          
                }
                if (!empty($request->get('tipo'))) {
                    $query->where('tipo', 'like', "%{$request->get('tipo')}%");          
                }
                if (!empty($request->get('descrip'))) {
                    $query->where('descrip', 'like', "%{$request->get('descrip')}%");          
                }
                if (!empty($request->get('f_comienzo'))) {
                    $query->where('f_comienzo', "{$request->get('f_comienzo')}");          
                }
                if (!empty($request->get('f_final'))) {
                    $query->where('f_final', "{$request->get('f_final')}");          
                }
            });
    }

    public function query(Corte $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'usuario'    => ['title' => 'Usuario','name'=>'usuario'],
                        'f_comienzo' => ['title' => 'Fecha comienzo' ,'name'=>'f_comienzo'],
                        'f_final'    => ['title' => 'Fecha final' ,'name'=>'f_final'],
                        'tipo'       => ['title' => 'Tipo','name'=>'tipo'],
                        'descrip'    => ['title' => 'Descripción' ,'name'=>'descrip'],
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
                        'url'     => route('cortes.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.usuario     = $('input[name=usuario]').val();
                            d.tipo        = $('input[name=tipo]').val();
                            d.descrip     = $('input[name=descrip]').val();
                            d.f_comienzo  = $('input[name=f_comienzo]').val();
                            d.f_final     = $('input[name=f_final]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'descrip',
            'usuario',
            'tipo',
            'f_comienzo',
            'f_final'
        ];
    }

    protected function filename()
    {
        return 'Listado de cortes del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }

}
