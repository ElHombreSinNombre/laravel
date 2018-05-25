{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/green.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        @if($libros->isEmpty())
            <div class="alert alert-error alert-data">
                <h3><b>No hay libros</b></h3>
            </div>
        @else  
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Envio automático de libros</b></h5>
            </div>
            <div class="panel-body"> 
                <div class="pull-right margin-bottom"><a href="{{route('libros.cargar')}}" class="form-control btn btn-primary" data-toggle="tooltip" title="Cargar datos"><i class="fa fa-refresh"></i> Cargar datos</a></div>
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Enviar</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td>{!! $libro->nombre !!}</td>
                                <td>{!! $libro->email !!}</td>
                                <td>{!! Form::checkbox('enviar', 'value',$libro->enviar==1 ? true:false) !!}</td>   
                                <td><a href="{{route('libros.edit',[$libro->id])}}" class="form-control btn btn-primary" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil-square-o"></i></a></td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
                <div class="text-center">{{ $libros->links() }}</div>
            </div> 
        </div>  
        @endif
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/icheck.js')}}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/check.js')}}" type="text/javascript"></script> 
@endsection