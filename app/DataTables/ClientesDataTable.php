<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\DepositoCliente;

//Facades
use Carbon;

class ClientesDataTable extends DataTable
{
 
    public function dataTable($query)
    {
        $request  = $this->request();
        $clientes = new EloquentDataTable($query);
        return $clientes
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($clientes) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('clientes.edit', [$clientes->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$clientes->nombre.'" data-route="' . route('clientes.delete', [$clientes->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })
            //Filtro
            ->filter(function ($query) use ($request) {
                if (!empty($request->get('nombre'))) {
                    $query->where('nombre', 'like', "%{$request->get('nombre')}%");          
                }
                if (!empty($request->get('persona_contacto'))) {
                    $query->where('persona_contacto', 'like', "%{$request->get('persona_contacto')}%");          
                }
                if (!empty($request->get('telefono_contacto'))) {
                    $query->where('telefono_contacto', 'like', "%{$request->get('telefono_contacto')}%");          
                }
            });
    }

    public function query(DepositoCliente $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'nombre'            => ['title' => 'Nombre','name'=>'nombre'],
                        'persona_contacto'  => ['title' => 'Persona contacto','name'=>'persona_contacto'],
                        'telefono_contacto' => ['title' => 'Teléfono contacto' ,'name'=>'telefono_contacto'],
                        'action'            => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
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
                        'url'     => route('clientes.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.nombre            = $('input[name=nombre]').val();
                            d.persona_contacto  = $('input[name=persona_contacto]').val();
                            d.telefono_contacto = $('input[name=telefono_contacto]').val();
               
                        }"
                    ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'nombre',
            'persona_contacto',
            'telefono_contacto'
        ];
    }

    protected function filename()
    {
        return 'Listado de clientes del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }

}
