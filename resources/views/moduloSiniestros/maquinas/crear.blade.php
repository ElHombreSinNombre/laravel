{{-- Extender de index --}}
@extends('moduloSiniestros.index') 
{{-- Nuevos estilos--}}
@section ('styles')
   <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{url('maquinas')}}"><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Creación de máquinas</b></h5></div>
            {!! Form::open(['route' => 'maquinas.store']) !!}
                @include('moduloSiniestros.maquinas.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
@endsection
