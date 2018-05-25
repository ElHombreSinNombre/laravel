<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/partials/listado.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/formulario.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select2.bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('/css/partials/select.css') }}">
    <title>Nuevo programador</title>
</head>
<body>
    <div class="panel">
        <div class="panel-heading"><h5><b>Nueva programación</b></h5></div>
            <div class="panel-body"> 
            {!! Form::open(['route' => 'libros.store']) !!}
                {{-- Código --}}
                <div class="form-group col-md-4">
                    {!! Form::label('codigo', 'Código') !!}
                    {!! Form::text('codigo',$programador->codigo, ['class' => 'form-control','placeholder'=>'Código...','readonly']) !!}
                </div>
                {{-- Descripción --}}
                <div class="form-group col-md-4">
                    {!! Form::label('descripcion', 'Descripcion') !!}
                    {!! Form::select('descripcion', $descripcionProgramador, isset($programador->tipoProgramador_programador->id) ? $programador->tipoProgramador_programador->id : null, ['class' => 'form-control select','placeholder'=>'Descripcion...']) !!}
                </div>
                {{-- Periocidad --}}
                <div class="form-group col-md-4">
                    {!! Form::label('periocidad', 'Periocidad') !!}
                    @if ($programador->periodicidad==1)
                        {!! Form::text('periocidad', 'Diario', ['class' => 'form-control','placeholder'=>'Periocidad...','readonly']) !!}
                    @elseif ($programador->periodicidad==2)
                        {!! Form::text('periocidad', 'Semanal', ['class' => 'form-control','placeholder'=>'Periocidad...','readonly']) !!}
                    @elseif ($programador->periodicidad==3)
                        {!! Form::text('periocidad', 'Mensual', ['class' => 'form-control','placeholder'=>'Periocidad...','readonly']) !!}
                    @else
                        {!! Form::text('periocidad', null, ['class' => 'form-control','placeholder'=>'Periocidad...','readonly']) !!}
                    @endif  
                </div>
                <div class="btn-toolbar inline col-md-12">
                    {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::button('Salir', ['class' => 'btn btn-default','data-dismiss'=>'modal']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
</body>
</html>