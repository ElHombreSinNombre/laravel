@php
    $ayuda = App\Http\Controllers\AyudaController::buscar(Request::path());
@endphp
<header class="main-header">
    <a href="{{route('home')}}" class="logo">
        <span class="logo-mini"><b>N</b></span>
        <span class="logo-lg"  data-toggle="tooltip" data-placement="bottom" title="Volver"><b>Noatum</b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Mostrar/Ocultar Menú</span>
        </a> 
        @if(isset($ayuda))
            <a class="navbar-brand" data-toggle="modal" data-target="#myModal" href="{!! route('ayudas.modal',$ayuda->id) !!}">{{ $titulo }} <i class="glyphicon glyphicon-info-sign"></i></a>
        @else
            <a class="navbar-brand">{{ $titulo }}</a>
        @endif
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">    
                @if($user)
                    <li class=" dropdown">
                        <a href="#" class="navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false">{{ $user->user_name }} </span><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                        </ul>
                    </li>
                @endif                  
            </ul>
        </div>
    </nav>
</header>
@if(isset($ayuda))
    @include('dashboard.partials.modal')
@endif

