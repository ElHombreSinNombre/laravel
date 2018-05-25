{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
        <li class="treeview {!! Request::is('pesos*')  ? 'active' : null !!}">
            <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Pesos</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="{!! Request::is('*pesos') ? 'active' : null !!}"><a href="{{url('pesos')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
            </ul>
        </li>
        <li class="treeview {!! Request::is('escalas*')  ? 'active' : null !!}">
            <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Escalas</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="{!! Request::is('*escalas*') ? 'active' : null !!}"><a href="{{route('estadisticas.escalas.listado')}}"><i class='glyphicon glyphicon-search'></i> Buscar</a></li>
            </ul>
        </li>
        <li class="treeview {!! Request::is('estancias*')  ? 'active' : null !!}">
            <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Estancias</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="{!! Request::is('*estancias*') ? 'active' : null !!}"><a href="{{route('estadisticas.estancias.listado')}}"><i class='glyphicon glyphicon-search'></i> Buscar</a></li>
            </ul>
        </li>
        <li class="treeview {!! Request::is('camiones*')  ? 'active' : null !!}">
            <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Camiones</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li class="{!! Request::is('*camiones') ? 'active' : null !!}"><a href="{{url('camiones')}}"><i class='glyphicon glyphicon-floppy-save'></i> Insertar</a></li>
            </ul>
        </li>
    @endslot
@endcomponent