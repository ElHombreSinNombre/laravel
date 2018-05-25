{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
            <li class="treeview">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Mapeo</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! url('/docs/Mapeo1.htm') !!}" target="_blank"><i class='glyphicon glyphicon-pencil'></i> Mapeo Car-Des</a></li>
                    <li><a href="{!! url('/docs/Mapeo_preavisos.htm') !!}" target="_blank"><i class='glyphicon glyphicon-pencil'></i> Mapeo Preavisos</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('cortes*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Cortes de servicio</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*cortes') ? 'active' : null !!}"><a href="{{url('cortes')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('cortes/create')  ? 'active' : null!!}"><a href="{{route('cortes.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview {!! Request::is('ayudas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Ayudas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*ayudas') ? 'active' : null !!}"><a href="{{url('ayudas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>             
                    <li class="{!! Request::is('ayudas/create')  ? 'active' : null !!}"><a href="{{route('ayudas.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="{!! url('/docs/Incidencias.htm') !!}" target="_blank" ><i class='glyphicon glyphicon-th'></i> <span>Incidencias</span></a>
            </li>
    @endslot
@endcomponent