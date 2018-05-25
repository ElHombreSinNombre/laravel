{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
             <li class="treeview {!! Request::is('clientes*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*clientes') ? 'active' : null !!}"><a href="{{url('clientes')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('clientes/create')  ? 'active' : null !!}"><a href="{{route('clientes.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('intermediarios*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Intermediarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*intermediarios') ? 'active' : null !!}"><a href="{{url('intermediarios')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('intermediarios/create')  ? 'active' : null !!}"><a href="{{route('intermediarios.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('operaciones*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Operaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*operaciones') ? 'active' : null !!}"><a href="{{url('operaciones')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('expedientes*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Expedientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*expedientes') ? 'active' : null !!}"><a href="{{url('expedientes')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('expedientes/create')  ? 'active' : null !!}"><a href="{{route('expedientes.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
    @endslot
@endcomponent