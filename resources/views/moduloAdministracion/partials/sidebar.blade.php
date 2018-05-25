{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
             <li class="treeview {!! Request::is('priagelines*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Priagelines</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*priagelines') ? 'active' : null !!}"><a href="{{url('priagelines')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('priagelines/create')  ? 'active' : null !!}"><a href="{{route('priagelines.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('rutas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Rutas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*rutas') ? 'active' : null !!}"><a href="{{url('rutas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('usuarios*')  || Request::is('departamentos*') || Request::is('permisos*') ? 'active' : null !!}">
                <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Seguridad</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview  {!!Request::is('usuarios*') ? 'active' : null !!}">
                        <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{!! Request::is('*usuarios') ? 'active' : null !!}"><a href="{{url('usuarios')}}"><i class="glyphicon glyphicon-list-alt"></i> Listado</a></li>
                            <li class="{!! Request::is('usuarios/create') ? 'active' : null !!}"><a href="{{route('usuarios.create')}}"><i class="glyphicon glyphicon-plus"></i> Nuevo</a></li>
                            <li class="{!! Request::is('usuarios/informes') ? 'active' : null !!}"><a href="{{route('usuarios.informes')}}"><i class="glyphicon glyphicon-folder-open"></i> Informes</a></li>
                        </ul>
                    </li>
                    <li class="treeview  {!!Request::is('departamentos*') ? 'active' : null !!}">
                        <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Departamentos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{!! Request::is('*departamentos') ? 'active' : null !!}"><a href="{{url('departamentos')}}"><i class="glyphicon glyphicon-list-alt"></i> Listado</a></li>
                            <li class="{!! Request::is('departamentos/create') ? 'active' : null !!}"><a href="{{route('departamentos.create')}}"><i class="glyphicon glyphicon-plus"></i> Nuevo</a></li>
                        </ul>
                    </li>
                    <li class="treeview  {!!Request::is('permisos*') ? 'active' : null !!}">
                        <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Permisos</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{!! Request::is('*permisos') ? 'active' : null !!}"><a href="{{url('permisos')}}"><i class="glyphicon glyphicon-list-alt"></i> Listado</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('libros*')  || Request::is('estancias*') ? 'active' : null !!}">
                <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Programador</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview {!! Request::is('libros*') ? 'active' : null !!}">
                        <a href="#"><i class="glyphicon glyphicon-th"></i> <span>Libros</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{!! Request::is('libros/general') ? 'active' : null !!}"><a href="{{route('libros.general')}}"><i class="glyphicon glyphicon-list-alt"></i> General</a></li>
                            <li class="{!! Request::is('libros/libros') ? 'active' : null !!}"><a href="{{route('libros.libros')}}"><i class="glyphicon glyphicon-book"></i> Libros</a></li>
                        </ul>
                    </li>
                    <li class="treeview {!! Request::is('estancias*') ? 'active' : null !!}">
                        <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Estancias</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li class="{!! Request::is('estancias/general') ? 'active' : null !!}"><a href="{{route('estancias.general')}}"><i class='glyphicon glyphicon-list-alt'></i> General</a></li>
                            <li class="{!! Request::is('estancias/correos') ? 'active' : null !!}"><a href="{{route('estancias.correos')}}"><i class='glyphicon glyphicon-envelope'></i> Correos</a></li>
                            <li class="{!! Request::is('estancias/parametros') ? 'active' : null !!}"><a href="{{route('estancias.create')}}"><i class='glyphicon glyphicon-wrench'></i> Parámetros</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('escalas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Escalas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*escalas') ? 'active' : null !!}"><a href="{{url('escalas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('escalas/parametros')  ? 'active' : null !!}"><a href="{{route('escalas.create')}}"><i class='glyphicon glyphicon-wrench'></i> Parámetros</a></li>
                </ul>
            </li>
    @endslot
@endcomponent