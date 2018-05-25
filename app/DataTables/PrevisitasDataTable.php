<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Visita;

//Facades
use Carbon;

class PreVisitasDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        $request = $this->request();
        $query->whereNull('f_salida')->where('previsita',1);
        $previsitas = new EloquentDataTable($query);
        return $previsitas
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($previsitas) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('previsitas.edit', [$previsitas->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$previsitas->nombre.'" data-route="' . route('previsitas.delete', [$previsitas->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })   
            //Modificación de columnas    
            ->editColumn('f_entrada', function ($date) {
                return $date->f_entrada ? Carbon::parse($date->f_entrada)->format('d-m-Y h:i:s'): null;
            })
            ->editColumn('visitado_id', function ($visitado) {
                return $visitado->visitado->nombreapellidos;
            })
            //Filtro
            ->filter(function ($query) use ($request) {
            if (!empty($request->get('nombre'))) {
                $query->where('nombre', 'like', "%{$request->get('nombre')}%");          
            }
            if (!empty($request->get('rango'))) {
                $rango = explode(' a ',$request->get('rango'));
                $query->whereBetween('f_entrada', [Carbon::createFromFormat('d/m/Y H:i:s', $rango[0])->format('Y-m-d'),Carbon::createFromFormat('d/m/Y H:i:s', $rango[1])->format('Y-m-d')]); 
            }
            if (!empty($request->get('empresa'))) {
                $query->where('empresa', 'like', "%{$request->get('empresa')}%");          
            }
            if (!empty($request->get('visitado_id'))) {
                $query->where('visitado_id', "{$request->get('visitado_id')}");          
            }
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
                        'action'      => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
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
                        'url'  => route('previsitas.listado'),
                        'data' => "function(d){
                            d.rango       = $('input[name=rango]').val();
                            d.nombre      = $('input[name=nombre]').val();
                            d.empresa     = $('input[name=empresa]').val();
                            d.visitado_id = $('select[name=visitado_id]').val();
                            d.activo      = $('input[name=activo]').attr('checked') ;
                        }"
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
