{{-- Extender de index --}}
@extends('moduloAdministracion.index') 
{{-- Nuevos estilos--}}
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/partials/dashboard.css') }}">
@endsection
{{-- Contenido de la página --}}
@section('content')
    <div class="content">
        @include('flash::message')
        @if($estanciasEmail->isEmpty())
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
                        <th>Email</th>
                        <th>Email2</th>
                        <th>Email3</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach ($estanciasEmail as $estanciaEmail)
                            <tr>
                                {!! Form::model($estanciaEmail, ['route' => ['estancias.correos.guardar', $estanciaEmail->id], 'method' => 'patch']) !!}
                                    <td>{!! $estanciaEmail->nombre !!}</td>
                                    <td>{!! Form::email('email', $estanciaEmail->email, ['class' => 'form-control','placeholder'=>'Email...']) !!}</td>
                                    <td>{!! Form::email('email2', $estanciaEmail->email2, ['class' => 'form-control','placeholder'=>'Email2...']) !!}</td>
                                    <td>{!! Form::email('email3', $estanciaEmail->email3, ['class' => 'form-control','placeholder'=>'Email3...']) !!}</td>
                                    <td>{!! Form::button('<i class="fa fa-floppy-o"></i>', ['type'=>'submit','class' => 'form-control  btn btn-primary','data-toggle'=>"tooltip",'title'=>'Grabar'])!!}</td> 
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
                <div class="text-center">{{ $estanciasEmail->links() }}</div>
            </div> 
        </div>  
        @endif
    </div>
@endsection
{{-- Nuevos javascripts --}}
@section('javascript')
@endsection