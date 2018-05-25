{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section ('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
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
            <div class="panel-heading"><h5><a href="{{route('usuarios.listado')}}"><h5><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Creación de usuario</b></h5></div>
            {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'patch']) !!}
                @include('moduloAdministracion.usuarios.formulario')
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

