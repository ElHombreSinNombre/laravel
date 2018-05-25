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
            <div class="panel-heading"><h5><a href="{{url('elementos')}}"><h5><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Modificación de elementos dañados</b></h5></div>
            {!! Form::model($elemento, ['route' => ['elementos.update', $elemento->id], 'method' => 'patch']) !!}
                @include('moduloSiniestros.elementosDaniados.formulario')
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

