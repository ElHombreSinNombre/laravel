<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\DepositoExpediente;

//Facades
use Carbon;

class ExpedientesDataTable extends DataTable
{
 
    public function dataTable($query)
    {
        $request = $this->request();
        $query->leftJoin('deposito_clientes','deposito_expedientes.cliente_id','deposito_clientes.id')->leftJoin('deposito_intermediarios','deposito_expedientes.intermediario_id','deposito_intermediarios.id')->leftJoin('deposito_tipo_doc_aduana','deposito_expedientes.tipo_documento_aduana_id','deposito_tipo_doc_aduana.id');
        $expedientes = new EloquentDataTable($query);
        return $expedientes
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($expedientes) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('expedientes.edit', [$expedientes->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$expedientes->codigo.'" data-route="' . route('expedientes.delete', [$expedientes->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })    
            //Modificación de columnas    
            ->editColumn('fecha_apertura', function ($date) {
                return $date->fecha_apertura ? Carbon::parse($date->fecha_apertura)->format('d-m-Y'): null;
            })
            ->editColumn('cliente_id', function ($cliente) {
                return $cliente->DepositoCliente->nombre;
            })
            ->editColumn('intermediario_id', function ($intermediario) {
                return $intermediario->DepositoIntermediario->nombre;
            })
            ->editColumn('tipo_documento_aduana_id', function ($aduana) {
                return $aduana->DepositoTipoDocAduana->nombre;
            })
            ->editColumn('deposito_id', function ($deposito) {
                return $deposito->deposito_id == 1 ? 'DA': 'DDA';
            })
            //Filtro
            ->filter(function ($query) use ($request) {
            if (!empty($request->get('codigo'))) {
                $query->where('codigo', "{$request->get('codigo')}");          
            }
            if (!empty($request->get('fecha_apertura'))) {
                $query->where('fecha_apertura', "{$request->get('fecha_apertura')}");          
            }
            if (!empty($request->get('descripcion_mercancia'))) {
                $query->where('descripcion_mercancia', 'like', "%{$request->get('descripcion_mercancia')}%");          
            }
            if (!empty($request->get('num_documento_aduana'))) {
                $query->where('num_documento_aduana', "{$request->get('num_documento_aduana')}");          
            }
            if (!empty($request->get('referencia_atm'))) {
                $query->where('referencia_atm', 'like', "%{$request->get('referencia_atm')}%");          
            }
            if (!empty($request->get('cliente_id'))) {
                $query->where('deposito_clientes.id', "{$request->get('cliente_id')}");          
            }
            if (!empty($request->get('tipo_documento_aduana_id'))) {
                $query->where('deposito_tipo_doc_aduana.id', "{$request->get('tipo_documento_aduana_id')}"); 
            }
            if (!empty($request->get('deposito_id'))) {
                $query->where('deposito_id', "{$request->get('deposito_id')}");          
            }
            if (!empty($request->get('intermediario_id'))) {
                $query->where('deposito_intermediarios.id', "{$request->get('intermediario_id')}");          
            }
            if (!empty($request->get('rango'))) {
                $rango = explode(' a ',$request->get('rango'));
                $query->whereBetween('fecha_apertura', [Carbon::createFromFormat('d/m/Y H:i:s', $rango[0])->format('Y-m-d'),Carbon::createFromFormat('d/m/Y H:i:s', $rango[1])->format('Y-m-d')]); 
            }
        });
    }

    public function query(DepositoExpediente $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'codigo'                   => ['title' => 'Código','name'=>'codigo'],
                        'fecha_apertura'           => ['title' => 'Fecha apertura','name'=>'fecha_apertura'],
                        'intermediario_id'         => ['title' => 'Intermediario','name'=>'intermediario_id'],
                        'cliente_id'               => ['title' => 'Cliente','name'=>'cliente_id'],
                        'referencia_atm'           => ['title' => 'Referencia ATM','name'=>'referencia_atm'],
                        'descripcion_mercancia'    => ['title' => 'Descripción mercancia','name'=>'descripcion_mercancia'],
                        'tipo_documento_aduana_id' => ['title' => 'T.DUA','name'=>'tipo_documento_aduana_id'],
                        'num_documento_aduana'     => ['title' => 'Núm. DUA','name'=>'num_documento_aduana'],
                        'deposito_id'              => ['title' => 'Tipo Dep.','name'=>'deposito_id'],
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
                        'url'     => route('expedientes.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.codigo                   = $('input[name=codigo]').val();
                            d.fecha                    = $('input[name=fecha]').val();
                            d.cliente_id               = $('select[name=cliente_id]').val();
                            d.intermediario_id         = $('select[name=intermediario_id]').val();
                            d.descripcion_mercancia    = $('input[name=descripcion_mercancia]').val();
                            d.referencia_atm           = $('input[name=referencia_atm]').val();
                            d.tipo_documento_aduana_id = $('select[name=tipo_documento_aduana_id]').val();
                            d.num_documento_aduana     = $('input[name=num_documento_aduana]').val();
                            d.deposito_id              = $('select[name=deposito_id]').val();
                            d.rango                    = $('input[name=rango]').val();
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'deposito_expedientes.id',
            'deposito_expedientes.codigo',
            'deposito_expedientes.fecha_apertura',
            'intermediario_id',
            'cliente_id',
            'referencia_atm',
            'descripcion_mercancia',
            'tipo_documento_aduana_id',
            'num_documento_aduana',
            'deposito_id'
        ];
    }

    protected function filename()
    {
        return 'Listado de expedientes del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
    
}
