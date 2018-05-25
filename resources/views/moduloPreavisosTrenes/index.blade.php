{{-- Extender de dashboard --}}
@extends('dashboard.main') 
{{-- Titulo de la página --}}
@section('title', 'Preavisos de trenes')
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/drop.css') }}">
@endsection
{{-- Titulo en el header --}}
@include('moduloPreavisosTrenes.partials.header')
{{-- Sidebar--}}
@include('moduloPreavisosTrenes.partials.sidebar')
{{-- Contenido de la página --}}
@section('content')
    <div class="content ">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><b>Preavisos de trenes</b></h5></div>
            <div class="panel-body">       
                @include('moduloPreavisosTrenes.formulario')
            </div>
        </div>
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/dropzone.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/drop.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
@endsection