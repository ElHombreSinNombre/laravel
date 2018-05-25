<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Siniestro;

//Facades
use Carbon;

class SiniestrosDataTable extends DataTable
{

    public function dataTable($query)
    {
        $request = $this->request();
        $query->select(['siniestro.id','siniestro.codigo','fecha_recepcion','identificacion','estado','tipo_objeto_siniestro.nombre'])->leftJoin('tipo_objeto_siniestro','siniestro.tipo_objeto_siniestro_id','tipo_objeto_siniestro.id');
        $siniestros = new EloquentDataTable($query);
        return $siniestros
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($siniestros) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('siniestros.edit', [$siniestros->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Informe" href="' . route('siniestros.excel', [$siniestros->id]) . '"><i class="glyphicon glyphicon-file"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$siniestros->codigo.'" data-route="' . route('siniestros.delete', [$siniestros->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })      
            //Modificación de columnas    
            ->editColumn('fecha_recepcion', function ($date) {
                return $date->fecha_recepcion ? Carbon::parse($date->fecha_recepcion)->format('d-m-Y'): null;
            })
            ->editColumn('estado', function ($state) {
                return $state->estado = 'C' ? 'Cerrado' : ' Abierto';
            }) 
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('codigo'))) {
                    $query->where('siniestro.codigo', 'like', "%{$request->get('codigo')}%");          
                }
                if (!empty($request->get('reclamante'))) {
                    $query->leftJoin('siniestro_reclamante', 'siniestro_reclamante.siniestro_id', 'siniestro.id')
                    ->leftJoin('reclamante', 'siniestro_reclamante.reclamante_id', 'reclamante.id')
                    ->where('reclamante.nombre', 'like', "%{$request->get('reclamante')}%");          
                }
                if (!empty($request->get('fecha_recepcion'))) {
                    $rango = explode(' a ',$request->get('rango'));
                    $query->whereBetween('fecha_recepcion', [Carbon::createFromFormat('d/m/Y', $rango[0])->format('Y-m-d'),Carbon::createFromFormat('d/m/Y', $rango[1])->format('Y-m-d')]); 
                }
                if (!empty($request->get('identificacion'))) {
                    $query->where('identificacion', 'like', "%{$request->get('identificacion')}%");          
                }
                if (!empty($request->get('tipo_operativa_id'))) {
                    $query->where('tipo_operativa_id', "{$request->get('tipo_operativa_id')}");          
                }
                if (!empty($request->get('tipo_objeto_siniestro_id'))) {
                    $query->where('tipo_objeto_siniestro_id', "{$request->get('tipo_objeto_siniestro_id')}");          
                }
                if (!empty($request->get('estado'))) {
                    $query->where('estado', "{$request->get('estado')}");          
                }
            });
    }

    public function query(Siniestro $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'codigo'          => ['title' => 'Código','name'=>'codigo'],
                        'fecha_recepcion' => ['title' => 'Fecha recepción','name'=>'fecha_recepcion'],
                        'identificacion'  => ['title' => 'Identificación' ,'name'=>'identificacion'],
                        'nombre'          => ['title' => 'Nombre','name'=>'nombre'],
                        'estado'          => ['title' => 'Estado','name'=>'estado'],
                        'action'          => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
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
                        'url'     => route('siniestros.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.codigo                   = $('input[name=codigo]').val();
                            d.reclamante               = $('input[name=reclamante]').val();
                            d.rango                    = $('input[name=rango]').val();
                            d.identificacion           = $('input[name=identificacion]').val();
                            d.tipo_operativa_id        = $('select[name=tipo_operativa_id]').val();
                            d.tipo_objeto_siniestro_id = $('select[name=tipo_objeto_siniestro_id]').val();
                            d.estado                   = $('select[name=estado]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'codigo',
            'fecha_recepcion',
            'identificacion',
            'nombre',
            'estado'
        ];
    }

    protected function filename()
    {
        return 'Listado de siniestros del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
    
}
