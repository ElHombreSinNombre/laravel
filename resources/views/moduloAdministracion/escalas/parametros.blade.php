{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section('styles')
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        @if($escalas->isEmpty())
            <div class="alert alert-error alert-data">
                No hay parámetros.
            </div> 
        @else
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Configuración de escalas</b></h5>
            </div>
            <div class="panel-body"> 
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($escalas as $escala)
                            <tr>
                                {!! Form::model($escala, ['route' => ['escalas.update', $escala->id], 'method' => 'patch']) !!}
                                    <td>{!! !empty($escala->descripcion) ? $escala->descripcion : 'No hay descripción' !!}</td>
                                    <td>{!! Form::text('valor', $escala->valor, ['class' => 'form-control','placeholder'=>'escala...']) !!}</td>
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
@endsection