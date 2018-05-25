{{-- Extender de index --}}
@extends('moduloDepositoAduanero.index') 
{{-- Nuevos estilos--}}
@section ('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/datatables-buttons.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/datetimepicker.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('dashboard.partials.error',['type'=> 'info'])
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{route('expedientes.listado')}}"><h5><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Modificación de expedientes</b></h5></div>
            {!! Form::model($expediente, ['route' => ['expedientes.update', $expediente->id], 'method' => 'patch']) !!}
                @include('moduloDepositoAduanero.expedientes.formulario')
            {!! Form::close() !!}
        </div>
    </div>
    <div class="content">
        @if(!$operacion->isEmpty())
        <div class="panel panel-default">
            <div class="panel-heading"><h5>Listado de operaciones que pertenecen al expediente <b>{!!$expediente->codigo!!}</b></h5></div>
            <div class="panel-body"> 
                <div class="pull-right margin-bottom"><a href="{{route('operaciones.create',[$expediente->id])}}" class="form-control btn btn-primary" data-toggle="tooltip" title="Nueva operación"><i class="fa fa-plus"></i> Nueva operación</a></div></b></h5>
                {!! $dataTable->table(['class'=>'table table-hover table-striped table-bordered']) !!}
            </div>
        </div>
        @else
            <div class="alert alert-error alert-data">
                No hay operaciones.
            </div> 
        @endif
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/datatables.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/timepicker.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/sweetalert.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/sweetdelete.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/datatables-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/custom-datatable-buttons.js') }}" type="text/javascript"></script>
<script src="{{asset('/js/partials/buttons.server-side.js') }}" type="text/javascript"></script>
    {!! $dataTable->scripts() !!}
@endsection

