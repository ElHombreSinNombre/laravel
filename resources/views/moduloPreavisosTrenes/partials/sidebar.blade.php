{{-- Elementos del menu lateral --}}
@component('dashboard/partials/sidebar')
    @slot('sidebar')
        <li class="treeview {!! Request::is('*preavisos/trenes*')  ? 'active' : null !!}">
            <a href="{{route('preavisos.principal')}}"><i class='glyphicon glyphicon-warning-sign'></i> <span>Preavisos de trenes</span></a>
        </li>  
    @endslot
@endcomponent

