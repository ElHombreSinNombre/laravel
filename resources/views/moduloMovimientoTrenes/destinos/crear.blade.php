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
            <div class="panel-heading"><h5><a href="{{url('destinos')}}"><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Creación de destinos</b></h5></div>
            {!! Form::open(['route' => 'destinos.store']) !!}
                @include('moduloMovimientoTrenes.destinos.formulario')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
@endsection
