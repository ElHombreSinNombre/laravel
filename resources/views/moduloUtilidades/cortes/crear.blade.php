{{-- Extender de index --}}
@extends('moduloUtilidades.index') 
{{-- Nuevos estilos--}}
@section ('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/datetimepicker.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{route('cortes.listado')}}"><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Creación de cortes</b></h5></div>
            {!! Form::open(['route' => 'cortes.store']) !!}
                @include('moduloUtilidades.cortes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/timepicker.js') }}" type="text/javascript"></script>
@endsection
