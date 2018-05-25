{{-- Extender de index --}}
@extends('moduloEstadistica.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/datetimepicker.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        @if($contar>0)
            <div class="alert alert-error alert-data">
                La base de datos ya tiene registros.
            </div> 
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Insertar Camiones</b></h5>
            </div>
            <div class="panel-body"> 
                {!! Form::open(['route' => 'camiones.store']) !!}
                    @include('moduloEstadistica.camiones.formulario')
                {!! Form::close() !!}
            </div> 
        </div>  
    </div>
</div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/timepicker.js') }}" type="text/javascript"></script>
@endsection