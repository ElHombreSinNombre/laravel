{{-- Extender de index --}}
@extends('moduloSiniestros.index') 
{{-- Nuevos estilos--}}
@section('styles')
   <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/daterangepicker.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/datatables-buttons.css') }}">
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><b>Gestión de informes</b></h5></div>
            <div class="panel-body"> 
                @include('moduloSiniestros.siniestros.filtros.informes')            
                {!! $dataTable->table(['class'=>'table table-hover table-striped table-bordered']) !!}    
            </div>
        </div>  
    </div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/datatables.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/daterangepicker.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/range.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/sweetalert.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/sweetdelete.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/datatables-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/custom-datatable-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/buttons.server-side.js') }}" type="text/javascript"></script>
    {!! $dataTable->scripts() !!}
@endsection