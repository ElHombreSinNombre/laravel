{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section('styles')
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><b>Gestión de rutas</b></h5>
            </div>
            <div class="panel-body"> 
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($rutas as $ruta)
                            <tr>
                                {!! Form::model($ruta, ['route' => ['rutas.guardar', $ruta->id], 'method' => 'patch']) !!}
                                    <td>{!! $ruta->descripcion !!}</td>
                                    <td>{!! Form::text('valor', $ruta->valor, ['class' => 'form-control','placeholder'=>'Ruta...']) !!}</td>
                                    <td>{!! Form::button('<i class="fa fa-floppy-o"></i>', ['type'=>'submit','class' => 'form-control  btn btn-primary','data-toggle'=>"tooltip",'title'=>'Grabar'])!!}</td> 
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div> 
        </div>  
    </div>
</div>  
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
@endsection