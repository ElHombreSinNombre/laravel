{{-- Extender de index --}}
@extends('moduloVisitas.index') 
{{-- Nuevos estilos--}}
@section('styles')
   <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Gestión de salidas</b></h5>
            </div>
            <div class="panel-body">  
                <div class="form-group">
                    <a class="btn btn-primary"  href="{{ route('visitas.listado') }}">Ver visitantes dentro</a>
                </div>
            </div> 
        </div>  
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Visitantes</b>
                    <h6>Visitantes activos <span data-toggle="tooltip" data-placement="top" title="Ver visitantes activos" class="badge badge-info"><a href="{{route('dashboard.visitas.activos')}}">{{$activos}}</span></a></h6>
                    <h6>Visitantes han salido hoy <span data-toggle="tooltip" data-placement="top" title="Ver visitantes que salen hoy" class="badge badge-danger"><a href="{{route('dashboard.visitas.hoySalen')}}">{{$salen}}</a></span></h6>
                </h5>
            </div>
            <div class="panel-body">  
                {!! $dataTable->table(['class'=>'table table-hover table-striped table-bordered']) !!}
                <div class="form-group">
                    <a class="btn btn-primary"  href="{{ route('visitas.create') }}">Nueva visita</a>
                    <a class="btn btn-default"  href="{{ route('dashboard.visitas.visitantes') }}">Ver más</a>
                </div>
            </div> 
        </div>  
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Previsitas</b>
                    <h6>Visitantes preveen su llegada hoy <span data-toggle="tooltip" data-placement="top" title="Ver visitantes que van a llegar hoy" class="badge badge-info"><a href="{{route('dashboard.visitas.hoyEntran')}}">{{$entran}}</a></span></h6>
                </h5>
            </div>
            <div class="panel-body"> 
                <table class="table table-hover table-striped table-bordered" id="previsitas-table">
                    <thead>
                        <tr>
                            <th>Fecha entrada</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Visitado</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                </table>                
                <div class="form-group">
                    <a class="btn btn-primary"  href="{{ route('previsitas.create') }}">Nueva previsita</a>
                    <a class="btn btn-default"  href="{{ route('dashboard.visitas.previsitas') }}">Ver más</a>
                </div>         
            </div>
        </div>  
    </div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/datatables.js') }}" type="text/javascript"></script> 
    {!! $dataTable->scripts() !!}
    @include('dashboard.partials.tables'),
@endsection