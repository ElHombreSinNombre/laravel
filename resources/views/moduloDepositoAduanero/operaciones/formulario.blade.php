<div class="panel-body"> 
    <div class="row">
        {{-- Expediente_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('expediente_codigo', 'Código Exp.:') !!}
            {!! Form::text('expediente_codigo', isset($operacion->expediente_id) ? $operacion->DepositoExpediente->codigo : null, ['class' => 'form-control','placeholder'=>'Código Exp...','readonly']) !!}
        </div>
        {{-- Fecha --}}
        <div class="form-group col-md-3">
            {!! Form::label('fecha', 'Fecha:') !!}
            <div class="input-group date">
                {!! Form::text('fecha', isset($operacion->fecha)  ? Carbon::parse($operacion->fecha)->format('d-m-Y'): null , ['class' => 'form-control' ,'placeholder'=>'Fecha...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div> 
        {{-- Cliente_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('cliente_id', 'Cliente') !!}
            {!! Form::text('cliente_id', isset($expediente->cliente_id) ? $operacion->DepositoCliente->nombre:null,['class' => 'form-control' ,'placeholder'=>'Cliente...','readonly']) !!}
        </div>
        {{-- Numero_documento_aduana_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('num_documento_aduana', 'Núm. DUA') !!}
            {!! Form::text('numero_documento_aduana_id', null, ['class' => 'form-control','placeholder'=>'Número documento aduana....']) !!}
        </div>
    </div>
    <div class="row">
        {{-- Operacion_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('tipo_operacion_id', 'Tipo operación') !!}
            {!! Form::select('tipo_operacion_id', $tipoOperacion, null,['class' => 'form-control select']) !!}
        </div>
        {{-- Transporte --}}
        <div class="form-group col-md-3">
            {!! Form::label('transporte', 'Transporte:') !!}
            {!! Form::text('transporte', null, ['class' => 'form-control','placeholder'=>'Transporte....']) !!}
        </div>
        {{-- Tipo_unidad_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('tipo_unidad_id', 'Tipo unidad:') !!}
            {!! Form::select('tipo_unidad_id', $tipoUnidad, null,['class' => 'form-control select']) !!}
        </div>
        {{-- Unidades --}}
        <div class="form-group col-md-3">
            {!! Form::label('unidades', 'Unidades:') !!}
            {!! Form::number('unidades', null, ['class' => 'form-control','placeholder'=>'Unidades....']) !!}
        </div>
    </div>
    <div class="row">
        {{-- Importe --}}
        <div class="form-group col-md-3">
            {!! Form::label('importe', 'Importe:') !!}
            {!! Form::number('importe', null, ['class' => 'form-control','placeholder'=>'Importe....']) !!}
        </div>
        {{-- Tipo_documento_aduana_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('tipo_documento_aduana_id', 'Tipo DUA') !!}
            {!! Form::select('tipo_documento_aduana_id', $tipoDocumento, null,['class' => 'form-control select']) !!}
        </div>
        {{-- Observaciones --}}
        <div class="form-group col-md-3">
            {!! Form::label('observaciones', 'Observaciones') !!}
            {!! Form::text('observaciones', null, ['class' => 'form-control','placeholder'=>'Observaciones....']) !!}
        </div>
        {{-- Intermediario --}}
        <div class="form-group col-md-3">
            {!! Form::label('intermediario', 'Intermediario') !!}
            {!! Form::text('intermediario', isset($expediente->intermediario_id) ? $expediente->DepositoIntermediario->nombre:null, ['class' => 'form-control','placeholder'=>'Intermediario....','readonly']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>