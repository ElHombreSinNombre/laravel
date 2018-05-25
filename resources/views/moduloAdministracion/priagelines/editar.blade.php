{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section ('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{route('priagelines.listado')}}"><h5><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Modificación de priagelines</b></h5></div>
            {!! Form::model($priagelin, ['route' => ['priagelines.update', $priagelin->id], 'method' => 'patch']) !!}
                @include('moduloAdministracion.priagelines.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
@endsection

