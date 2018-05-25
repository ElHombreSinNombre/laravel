{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/switch.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        @if($estancias->isEmpty())
            <div class="alert alert-error alert-data">
                No hay parámetros.
            </div> 
        @else
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Configuración de estancias</b></h5>
            </div>
            <div class="panel-body"> 
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($estancias as $estancia)
                            <tr>
                                {!! Form::model($estancia, ['route' => ['estancias.update', $estancia->id], 'method' => 'patch']) !!}
                                    <td>{!! !empty($estancia->descripcion) ? $estancia->descripcion : 'No hay descripción' !!}</td>
                                    <td>{!! Form::text('valor', $estancia->valor, ['class' => 'form-control','placeholder'=>'Valor...']) !!}</td>
                                    <td>{!! Form::button('<i class="fa fa-floppy-o"></i>', ['type'=>'submit','class' => 'form-control  btn btn-primary','data-toggle'=>"tooltip",'title'=>'Grabar'])!!}</td> 
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div> 
        </div>  
        @endif
    </div> 
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
    <script src="{{asset('/js/partials/switch.js') }}" type="text/javascript"></script>
    <script src="{{asset('/js/partials/choose.js') }}" type="text/javascript"></script>
@endsection