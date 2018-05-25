{{-- Extender de dashboard --}}
@extends('dashboard.main') 
{{-- Titulo de la página --}}
@section('title', 'Cargas y Descargas')
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
@endsection
{{-- Titulo en el header --}}
@include('moduloCargasYDescargas.partials.header')
{{-- Sidebar--}}
@include('moduloCargasYDescargas.partials.sidebar')
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><b>Cargas y descargas</b></h5></div>
            <div class="panel-body">       
                @include('moduloCargasYDescargas.formulario')
            </div>
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
@endsection