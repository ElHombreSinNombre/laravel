<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\DepositoOperacion;

//Facades
use Carbon;

class OperacionesDataTable extends DataTable
{

    public function dataTable($query)
    {
        $request     = $this->request();
        $query->leftJoin('deposito_expedientes','deposito_operaciones.expediente_id','deposito_expedientes.id')->leftJoin('deposito_clientes','deposito_operaciones.cliente_id','deposito_clientes.id')->leftJoin('deposito_tipo_doc_aduana','deposito_operaciones.tipo_documento_aduana_id','deposito_tipo_doc_aduana.id');
        $operaciones = new EloquentDataTable($query);
        return $operaciones
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($operaciones) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('operaciones.edit', [$operaciones->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$operaciones->expediente_id.'" data-route="' . route('operaciones.delete', [$operaciones->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
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
            })
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('codigo'))) {
                    $query->where('deposito_expedientes.codigo', "{$request->get('codigo')}");          
                }
                if (!empty($request->get('fecha'))) {
                    $query->where('fecha', "{$request->get('fecha')}");          
                }
                if (!empty($request->get('cliente_id'))) {
                    $query->where('deposito_clientes.id', "{$request->get('cliente_id')}");          
                }
                if (!empty($request->get('numero_documento_aduana_id'))) {
                    $query->where('num_documento_aduana', 'like', "%{$request->get('numero_documento_aduana_id')}%");          
                }
                if (!empty($request->get('tipo_operacion_id'))) {
                    $query->where('tipo_operacion_id', "{$request->get('tipo_operacion_id')}");          
                }
                if (!empty($request->get('transporte'))) {
                    $query->where('transporte', 'like', "%{$request->get('transporte')}%");          
                }
                if (!empty($request->get('tipo_unidad_id'))) {
                    $query->where('tipo_unidad_id', "{$request->get('tipo_unidad_id')}");          
                }
                if (!empty($request->get('unidades'))) {
                    $query->where('unidades', "{$request->get('unidades')}");          
                }
                if (!empty($request->get('importe'))) {
                    $query->where('importe',"{$request->get('importe')}");          
                }
                if (!empty($request->get('tipo_documento_aduana_id'))) {
                    $query->where('deposito_tipo_doc_aduana.id', "{$request->get('tipo_documento_aduana_id')}"); 
                }
                if (!empty($request->get('rango'))) {
                    $rango = explode(' a ',$request->get('rango'));
                    $query->whereBetween('fecha', [Carbon::createFromFormat('d/m/Y H:i:s', $rango[0])->format('Y-m-d'),Carbon::createFromFormat('d/m/Y H:i:s', $rango[1])->format('Y-m-d')]); 
                }
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
                        'importe'                  => ['title' => 'Importe','name'=>'importe'],
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
                            ['separator'],
                            ['extend' => 'clean', 'text' => '<i class="fa fa-eraser"></i> Limpiar filtros'],
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
                        'url'     => route('operaciones.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.codigo                   = $('input[name=codigo]').val();
                            d.fecha                    = $('input[name=fecha]').val();
                            d.cliente_id               = $('select[name=cliente_id]').val();
                            d.num_documento_aduana     = $('input[name=num_documento_aduana]').val();
                            d.tipo_operacion_id        = $('select[name=tipo_operacion_id]').val();
                            d.transporte               = $('input[name=transporte]').val();
                            d.tipo_unidad_id           = $('select[name=tipo_unidad_id]').val();
                            d.unidades                 = $('input[name=unidades]').val();
                            d.importe                  = $('input[name=importe]').val();
                            d.tipo_documento_aduana_id = $('select[name=tipo_documento_aduana_id]').val();
                            d.rango                    = $('input[name=rango]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'deposito_operaciones.id',
            'expediente_id',
            'fecha',
            'deposito_operaciones.cliente_id',
            'tipo_operacion_id',
            'transporte',
            'unidades',
            'importe',
            'deposito_operaciones.tipo_documento_aduana_id',
            'deposito_operaciones.num_documento_aduana',
            'observaciones'
        ];
    }

    protected function filename()
    {
        return 'Listado de operaciones del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
    
}
