<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

//Models
use App\Models\Usuario;

//Facades
use Carbon;

class UsuariosDataTable extends DataTable
{

    public function dataTable($query)
    {
        $request = $this->request();
        $usuarios = new EloquentDataTable($query);
        return $usuarios  
            //Columna Editar/Eliminar/Informe
            ->addColumn('action', function ($usuarios) {
            return 
                '<a data-toggle="tooltip" data-placement="top" title="Editar" href="' . route('usuarios.edit', [$usuarios->id]) . '"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="'.$usuarios->user_name.'" data-route="' . route('usuarios.delete', [$usuarios->id]) . '"><i class="glyphicon glyphicon-remove"></i></a>';
            })   
            ->editColumn('department_id', function ($usuarios) {
                return $usuarios->departamento->name;
            })
            //Filtro
            ->filter(function ($query) use ($request) {
            if (!empty($request->get('user_name'))) {
                $query->where('user_name', 'like', "%{$request->get('user_name')}%");          
            }
            if (!empty($request->get('department_id'))) {
                $query->where('department_id', 'like', "%{$request->get('department_id')}%");          
            }
        });
    }

    public function query(Usuario $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    public function html()
    {
        return $this->builder()
                    ->columns([
                        'user_name'     => ['title' => 'Nombre','name'=>'user_name'],
                        'department_id' => ['title' => 'Departamento','name'=>'department_id'],
                        'action'        => ['title' => 'Acción','name'=>'action', 'orderable'=>false, 'searchable'=>false, 'exportable'=>false],
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
                        'url'     => route('usuarios.listado'),
                        'headers' => [
                            'X-CSRF-TOKEN' => '{{csrf_token()}}'
                        ],
                        'data' => "function(d){
                            d.user_name     = $('input[name=user_name]').val();
                            d.department_id = $('input[name=department_id]').val();

                        }"
                    ]);                  
    }

    protected function getColumns()
    {
        return [
            'id',
            'user_name',
            'department_id',
        ];
    }

    protected function filename()
    {
        return 'Listado de usuario del ' . Carbon:: now()->format('d/m/Y H:i:s');
    }
}
