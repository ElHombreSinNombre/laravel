{{-- Extender de index --}}
@extends('moduloMovimientoTrenes.index') 
{{-- Nuevos estilos--}}
@section ('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{url('operadores')}}"><h5><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Modificación de operadores</b></h5></div>
            {!! Form::model($operador, ['route' => ['operadores.update', $operador->id], 'method' => 'patch']) !!}
                @include('moduloMovimientoTrenes.operadores.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
@endsection

