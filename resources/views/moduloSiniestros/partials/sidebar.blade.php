{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
            <li class="treeview {!! Request::is('siniestros*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Siniestros</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*siniestros') ? 'active' : null!!}"><a href="{{url('siniestros')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*create') ? 'active' : null !!}"><a href="{{route('siniestros.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                    <li class="{!! Request::is('*informes') ? 'active' : null !!}"><a href="{{url('siniestros/informes')}}"><i class='glyphicon glyphicon-folder-open'></i> Informes</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('reclamantes*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Reclamantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*reclamantes') ? 'active' : null !!}"><a href="{{url('reclamantes')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*create')  ? 'active' : null !!}"><a href="{{route('reclamantes.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('maquinas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Máquinas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*maquinas')  ? 'active' : null !!}"><a href="{{url('maquinas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*create')  ? 'active' : null !!}"><a href="{{route('maquinas.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li>
             <li class="treeview {!! Request::is('polizas*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Tipos de poliza</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        <li class="{!! Request::is('*polizas')  ? 'active' : null !!}"><a href="{{url('polizas')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                        <li class="{!! Request::is('*create')  ? 'active' : null !!}"><a href="{{route('polizas.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                    </ul>
            </li>
             <li class="treeview {!! Request::is('elementos*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Elementos Dañados</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*elementos')  ? 'active' : null !!}"><a href="{{url('elementos')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*create')  ? 'active' : null !!}"><a href="{{route('elementos.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li> 
             <li class="treeview {!! Request::is('objetos*')  ? 'active' : null !!}">
                <a href="#"><i class='glyphicon glyphicon-th'></i> <span>Objetos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{!! Request::is('*objetos')  ? 'active' : null !!}"><a href="{{url('objetos')}}"><i class='glyphicon glyphicon-list-alt'></i> Listado</a></li>
                    <li class="{!! Request::is('*create')  ? 'active' : null !!}"><a href="{{route('objetos.create')}}"><i class='glyphicon glyphicon-plus'></i> Nuevo</a></li>
                </ul>
            </li> 
    @endslot
@endcomponent