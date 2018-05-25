{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/datatables.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">

@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        @if($usuarios->isEmpty())
            <div class="alert alert-error alert-data">
                <h3><b>No hay usuario</b></h3>
            </div>
        @else  
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Gestión de informes</b></h5>
            </div>
            <div class="panel-body"> 
                <div class="pull-right margin-bottom"><a href="{{route('usuarios.excel')}}" class="form-control btn btn-primary" data-toggle="tooltip" title="Decargar informe"><i class="fa fa-download"></i> Descargar informe</a></div>
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Password</th>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{!! $usuario->user_name !!}</td>
                                <td>{!! $usuario->password !!}</td>
                                <td>{!! isset($usuario->departamento->name) ? $usuario->departamento->name :null !!}</td>
                                <td>{!! $usuario->nombre !!}</td>
                                <td>{!! $usuario->apellido !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
                <div class="text-center">{{ $usuarios->links() }}</div>
            </div> 
        </div>  
        @endif
    </div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')

@endsection