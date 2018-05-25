{{-- Extender de index --}}
@extends('moduloEstadistica.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/datatables-buttons.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Gestión de escalas</b></h5>
            </div>
            {!! Form::open(['route' => 'estadisticas.escalas.listado']) !!}
                @include('moduloEstadistica.escalas.formulario')
            {!! Form::close() !!}   
            <div class="panel-body"> 
                @if(!empty($vsl_cd) || !empty($cntr_no))
                    {!! $dataTable->table(['class'=>'table table-hover table-striped table-bordered']) !!}    
                @endif
            </div> 
        </div>  
    </div>
</div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/disable.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/daterangepicker.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/range.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/datatables.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/datatables-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/custom-datatable-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/buttons.server-side.js') }}" type="text/javascript"></script>
    @if(!empty($vsl_cd) || !empty($cntr_no))
        {!! $dataTable->scripts() !!}
    @endif
@endsection