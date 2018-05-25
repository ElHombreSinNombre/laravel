{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
             <li class="treeview {!! Request::is('destinos*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Destinos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*destinos') ? 'active' : null !!}"><a href="{{url('destinos')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('destinos/create')  ? 'active' : null !!}"><a href="{{route('destinos.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('movimientos*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Movimientos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*movimientos')  ? 'active' : null !!}"><a href="{{url('movimientos')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*movimientos/create')  ? 'active' : null !!}"><a href="{{route('movimientos.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('operadores*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Operadores</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        <li class="{!! Request::is('*operadores')  ? 'active' : null !!}"><a href="{{url('operadores')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                        <li class="{!! Request::is('*operadores/create')  ? 'active' : null !!}"><a href="{{route('operadores.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('propietarios*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Propietarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*propietarios')  ? 'active' : null !!}"><a href="{{url('propietarios')}}"><i class='glyphicon glyphicon-list-alt'></i> Visitas</a></li>
                    <li class="{!! Request::is('*propietarios/create')  ? 'active' : null !!}"><a href="{{route('propietarios.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li> 
    @endslot
@endcomponent