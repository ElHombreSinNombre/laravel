<div class="panel-body"> 
    <div class="row">
        {{-- Código --}}
        <div class="form-group col-md-3">
            {!! Form::label('codigo', 'Código:') !!}
            {!! Form::text('codigo', isset($codigo) ? $codigo : $expediente->codigo, ['class' => 'form-control','placeholder'=>'Código...']) !!}
        </div>
        {{-- Fecha Apertura --}}
        <div class="form-group col-md-3">
            {!! Form::label('fecha_apertura', 'Fecha apertura:') !!}
            <div class="input-group date">
                {!! Form::text('fecha_apertura', isset($expediente->fecha_apertura) ? Carbon::parse($expediente->fecha_apertura)->format('d-m-Y'): null , ['class' => 'form-control' ,'placeholder'=>'Fecha apertura...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div> 
        {{-- Cliente_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('cliente_id', 'Cliente') !!}
            {!! Form::select('cliente_id', $nombreCliente, isset($expediente->cliente_id) ? $expediente->cliente_id : null,['class' => 'form-control select']) !!}
        </div>
        {{-- Intermediario_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('intermediario_id', 'Intermediario') !!}
            {!! Form::select('intermediario_id', $nombreIntermediario, isset($expediente->intermediario_id) ? $expediente->intermediario_id : null,['class' => 'form-control select']) !!}
        </div>
    </div>
    <div class="row">
        {{-- Referencia_ATM --}}
        <div class="form-group col-md-3">
            {!! Form::label('referencia_atm', 'Referencia ATM:') !!}
            {!! Form::text('referencia_atm', isset($expediente->referencia_ATM) ? $expediente->referencia_ATM : null,['class' => 'form-control','placeholder'=>'Referencia ATM....']) !!}
        </div>
        {{-- Descripcion_mercancia --}}
        <div class="form-group col-md-3">
            {!! Form::label('descripcion_mercancia', 'Descripción mercancia:') !!}
            {!! Form::text('descripcion_mercancia', isset($expediente->descripcion_mercancia) ? $expediente->descripcion_mercancia : null, ['class' => 'form-control','placeholder'=>'Descripción mercancia....']) !!}
        </div>
        {{-- Tipo_documento_aduana_id --}}
         <div class="form-group col-md-3">
            {!! Form::label('tipo_documento_aduana_id', 'Tipo DUA') !!}
            {!! Form::select('tipo_documento_aduana_id', $tipoDocumento, isset($expediente->tipo_documento_aduana) ? $expediente->tipo_documento_aduana : null,['class' => 'form-control select']) !!}
        </div>
        {{-- Numero_documento_aduana_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('numero_documento_aduana_id', 'Núm. DUA') !!}
            {!! Form::text('numero_documento_aduana_id', isset($expediente->num_documento_aduana) ? $expediente->num_documento_aduana : null, ['class' => 'form-control','placeholder'=>'Número documento aduana....']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>