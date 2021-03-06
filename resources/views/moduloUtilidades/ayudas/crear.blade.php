{{-- Extender de index --}}
@extends('moduloUtilidades.index') 
{{-- Nuevos estilos--}}
@section ('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/summernote.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{route('ayudas.listado')}}"><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Creación de ayudas</b></h5></div>
            {!! Form::open(['route' => 'ayudas.store']) !!}
                @include('moduloUtilidades.ayudas.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/summernote.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/summernote_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/textarea.js') }}" type="text/javascript"></script> 
@endsection
