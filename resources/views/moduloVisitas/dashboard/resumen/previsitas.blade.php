
{{-- Extender de index --}}
@extends('moduloVisitas.index') 
{{-- Nuevos estilos--}}
@section('styles')
   <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
   <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
@endsection
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading"><h5><a href="{{route('dashboard')}}"><i class="fa fa-chevron-circle-left" data-toggle="tooltip" data-placement="bottom" title="Atrás"></i></a><b> Previsitas</b></h5></div>
            <div class="panel-body">       
                {!! $dataTable->table(['class'=>'table table-hover table-striped table-bordered']) !!}
            </div> 
        </div>  
    </div>  
</div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/datatables.js') }}" type="text/javascript"></script> 
    {!! $dataTable->scripts() !!}
@endsection