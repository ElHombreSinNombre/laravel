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
        @if($departamentos->isEmpty())
            <div class="alert alert-error alert-data">
                <h3><b>No hay permisos</b></h3>
            </div>
        @else  
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Gestión de permisos</b></h5>
            </div>
            <div class="panel-body"> 
                <div class="table-responsive">
                    <div class="pull-right margin-bottom"><a href="{{route('permisos.excel')}}" class="form-control btn btn-primary" data-toggle="tooltip" title="Decargar informe"><i class="fa fa-download"></i> Descargar informe</a></div>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <th>Departamentos</th>
                            @foreach($elementos_seguridad as $elemento_seguridad) 
                                <th>{!! $elemento_seguridad->name !!}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach($departamentos as $departamento) 
                                <tr>
                                    <td>{!! $departamento->name !!}</td>        
                                    @foreach($elementos_seguridad as $elemento_seguridad)        
                                        @if($departamento->conPermiso($elemento_seguridad->id))
                                            <td>{!! Form::checkbox('enviar', $departamento->id, true,['data-valuetwo'=>$elemento_seguridad->id,'data-click'=>'permisos']) !!}</td>   
                                        @else
                                            <td>{!! Form::checkbox('enviar', $departamento->id, false,['data-valuetwo'=>$elemento_seguridad->id,'data-click'=>'permisos']) !!}</td>
                                        @endif   
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="text-center">{{ $departamentos->links() }}</div>     
            </div> 
        </div>
        @endif 
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/sweetalert.js') }}" type="text/javascript"></script>  
    <script src="{{asset('/js/partials/ajax.js')}}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/icheck.js')}}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/check.js')}}" type="text/javascript"></script> 
@endsection