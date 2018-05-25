@extends('puerto.template.main') 
@section ('title', 'Puerto') 
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/puerto.css') }}"> 
    <link rel="stylesheet" href="{{asset('/css/partials/main.css') }}"> 
@endsection 
@section('content')
<div class="container">
    <section class="row">
        @if($acceder->departamento->conPermiso(3))
                <!-- Carga y Descarga -->
                <a class="col-lg-3 iconos" href="{{route('cargas-descargas.principal')}}"><img class="img-responsive" src="img/cargadescarga.png" data-toggle="tooltip" data-placement="right" title="Carga Y Descarga" alt="Carga Y Descarga"></a>
        @endif
        @if($acceder->departamento->conPermiso(4))
                <!-- Coreor -->
                <a class="col-lg-3 iconos" href="copamcoreor"><img class="img-responsive" src="img/estadisticas.png" data-toggle="tooltip" data-placement="right" title="Copam Coreor" alt="Copam Coreor"></a>
        @endif
        @if($acceder->departamento->conPermiso(5))
                <!-- Uso de Trenes -->
                <a class="col-lg-3 iconos" href="{{route('trenes.principal')}}"><img class="img-responsive" src="img/movimientos_de_trenes.png" data-toggle="tooltip" data-placement="right" title="Movimiento de Trenes" alt="Movimiento de Trenes"></a>
        @endif
        @if($acceder->departamento->conPermiso(6))
                <!-- Preavisos Trenes -->
                <a class="col-lg-3 iconos" href="{{route('preavisos.principal')}}"><img class="img-responsive" src="img/preavisos_trenes.png" data-toggle="tooltip" data-placement="right" title="Preavisos Trenes" alt="Preavisos Trenes"></a>
        @endif
        @if($acceder->departamento->conPermiso(7))
                <!-- Estadisticas -->
                <a class="col-lg-3 iconos" href="{{route('estadistica.principal')}}"><img class="img-responsive" src="img/estadistica.png" data-toggle="tooltip" data-placement="right" title="Estadística" alt="Estadística"></a>
        @endif
        @if($acceder->departamento->conPermiso(9))
                <!-- Utilidades -->
                <a class="col-lg-3 iconos" href="{{route('utilidades.principal')}}"><img class="img-responsive" src="img/utilidades.png" data-toggle="tooltip" data-placement="right" title="Utilidades" alt="Utilidades"></a>
        @endif
        @if($acceder->departamento->conPermiso(8))
                <!-- Pesos -->
                <a class="col-lg-3 iconos" href="pesos"><img class="img-responsive" src="img/peso.png" data-toggle="tooltip" data-placement="right" title="Pesos" alt="Pesos"></a>
        @endif
        @if($acceder->departamento->conPermiso(2))
        <!-- Visitas -->
        <a class="col-lg-3 iconos" href="{{route('visitas.principal')}}"><img class="img-responsive" src="img/registro.png" data-toggle="tooltip" data-placement="right" title="Registro de Visitas" alt="Registro de Visitas"></a>
        @endif
        @if($acceder->departamento->conPermiso(10))
                <!-- Anotadores -->
                <a class="col-lg-3 iconos" href="anotadores"><img class="img-responsive" src="img/anotadores.png" data-toggle="tooltip" data-placement="right" title="Listado de Anotadores" alt="Listado de Anotadores"></a>
        @endif
        @if($acceder->departamento->conPermiso(1))
                <!-- Siniestros -->
                <a class="col-lg-3 iconos" href="{{route('siniestros.principal')}}"><img class="img-responsive" src="img/siniestros.png" data-toggle="tooltip" data-placement="right" title="Gestión de Siniestros" alt="Gestión de Siniestros"></a>
        @endif
        @if($acceder->departamento->conPermiso(11))
                <!-- Tablas Maestras -->
                <a class="col-lg-3 iconos" href="{{route('administracion.principal')}}"><img class="img-responsive" src="img/tablasmaestras.png" data-toggle="tooltip" data-placement="right" title="Administración del sistema" alt="Administración del sistema"></a>
        @endif
        @if($acceder->departamento->conPermiso(14))
                <!-- Deposito Aduanero-->
                <a class="col-lg-3 iconos" href="{{route('deposito-aduanero.principal')}}"><img class="img-responsive" src="img/deposito.png" data-toggle="tooltip" data-placement="right" title="Deposito aduanero" alt="Deposito aduanero"></a>
        @endif
    </section>
</div>
@endsection