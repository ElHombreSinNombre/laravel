<div class="panel-body"> 
    <div class="row">
        {{-- Fecha --}}
        <div class="form-group col-md-3">
            {!! Form::label('fecha', 'Fecha:') !!}
            <div class="input-group date">
                {!! Form::text('fecha', isset($movimiento->fecha)  ? Carbon::parse($movimiento->fecha)->format('d-m-Y'): null, ['class' => 'form-control','placeholder'=>'Fecha...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>  
        {{-- Tipo movimiento --}}
        <div class="form-group col-md-3">
            {!! Form::label('tipo_movimiento', 'Tipo movimiento:') !!}
            {!! Form::text('tipo_movimiento', null, ['class' => 'form-control','placeholder'=>'Tipo movimiento...']) !!}
        </div>
        {{-- Operador --}}
        <div class="form-group col-md-3">
            {!! Form::label('operador', 'Operador:') !!}
            {!! Form::select('operador', $nombreMovimiento,null, ['class' => 'form-control']) !!}
        </div>
        {{-- Propietario --}}
        <div class="form-group col-md-3">
            {!! Form::label('propietario', 'Propietario:') !!}
            {!! Form::text('propietario', null, ['class' => 'form-control','placeholder'=>'Propietario...']) !!}
        </div>
    </div>
    <div class="row">
        {{-- Ciudad --}}
        <div class="form-group col-md-3">
            {!! Form::label('ciudad', 'Ciudad:') !!}
            {!! Form::text('ciudad', null, ['class' => 'form-control','placeholder'=>'Ciudad...']) !!}
        </div>
        {{-- Número contenedores --}}
        <div class="form-group col-md-3">
            {!! Form::label('numero_contenedores', 'Número contenedores:') !!}
            {!! Form::number('numero_contenedores', null, ['class' => 'form-control','placeholder'=>'Número contenedores...']) !!}
        </div>
        {{-- Teus --}}
        <div class="form-group col-md-3">
            {!! Form::label('teus', 'Teus:') !!}
            {!! Form::number('teus', null, ['class' => 'form-control','placeholder'=>'Teus...']) !!}
        </div>
        {{-- Grabar --}}
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>