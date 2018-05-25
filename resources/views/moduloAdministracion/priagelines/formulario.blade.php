<div class="panel-body"> 
    <div class="row">
        {{-- Módulo--}}
        <div class="form-group col-md-4">
            {!! Form::label('modulo', 'Módulo') !!}
            {!! Form::text('modulo',null, ['class' => 'form-control','placeholder'=>'Módulo...']) !!}
        </div>
        {{-- Cliente--}}
        <div class="form-group col-md-4">
            {!! Form::label('cliente', 'Cliente') !!}
            {!! Form::text('cliente', null, ['class' => 'form-control','placeholder'=>'Cliente...']) !!}
        </div>
        {{-- Principal--}}
        <div class="form-group col-md-4">
            {!! Form::label('principal', 'Principal') !!}
            {!! Form::text('principal', null, ['class' => 'form-control','placeholder'=>'Principal...']) !!}
        </div>
    </div>
    <div class="row">
        {{-- Agente--}}
        <div class="form-group col-md-4">
            {!! Form::label('agente', 'Agente') !!}
            {!! Form::text('agente', null, ['class' => 'form-control','placeholder'=>'Agente...']) !!}
        </div>
        {{-- Línea--}}
        <div class="form-group col-md-4">
            {!! Form::label('linea', 'Línea') !!}
            {!! Form::text('linea', null, ['class' => 'form-control','placeholder'=>'Línea...']) !!}
        </div>
        {{-- Buscar--}}
        <div class="form-group col-md-4">
            {!! Form::label('buscar', 'Buscar') !!}
            {!! Form::text('buscar', null, ['class' => 'form-control','placeholder'=>'Buscar...']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>