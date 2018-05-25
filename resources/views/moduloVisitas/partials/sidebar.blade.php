{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
            <li class="treeview {!! Request::is('*dashboard*')  ? 'active' : null !!}">
                <a href="{{url('dashboard/visitas')}}"><i class='glyphicon glyphicon-th'></i> <span>Dashboard</span></a>
            </li>
             <li class="treeview {!! Request::is('visitas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Visitas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*visitas') ? 'active' : null !!}"><a href="{{url('visitas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('visitas/create')  ? 'active' : null!!}"><a href="{{route('visitas.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('previsitas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Pre-visitas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*previsitas')  ? 'active' : null !!}"><a href="{{url('previsitas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*previsitas/create')  ? 'active' : null !!}"><a href="{{route('previsitas.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('tablets*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Tablets</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        <li class="{!! Request::is('*tablets')  ? 'active' : null !!}"><a href="{{url('tablets')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                        <li class="{!! Request::is('*tablets/create')  ? 'active' : null !!}"><a href="{{route('tablets.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('configuracion*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*configuracion/visitas')  ? 'active' : null !!}"><a href="{{url('configuracion/visitas')}}"><i class='glyphicon glyphicon-list-alt'></i> Visitas</a></li>
                    <li class="{!! Request::is('*configuracion/notificacion')  ? 'active' : null !!}"><a href="{{url('configuracion/notificacion')}}"><i class='glyphicon glyphicon-comment'></i> Notificación</a></li>
                </ul>
            </li> 
    @endslot
@endcomponent