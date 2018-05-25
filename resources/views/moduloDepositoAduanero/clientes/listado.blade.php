{{-- Extender de index --}}
@extends('moduloDepositoAduanero.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/datatables-buttons.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Gestión de clientes</b></h5>
            </div>
            <div class="panel-body"> 
                @include('moduloDepositoAduanero.clientes.filtros.listado')     
                {!! $dataTable->table(['class'=>'table table-hover table-striped table-bordered']) !!}
            </div> 
        </div>  
    </div>
</div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/datatables.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/sweetalert.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/sweetdelete.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/datatables-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/custom-datatable-buttons.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/buttons.server-side.js') }}" type="text/javascript"></script>
    {!! $dataTable->scripts() !!}
@endsection