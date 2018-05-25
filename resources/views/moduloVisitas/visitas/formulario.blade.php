<div class="panel-body"> 
    <div class="row">
        {{-- Nombre --}}
        <div class="form-group col-md-3">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
        {{-- Empresa --}}
         <div class="form-group col-md-3">
            {!! Form::label('empresa', 'Empresa:') !!}
            {!! Form::text('empresa', null, ['class' => 'form-control','placeholder'=>'Empresa...']) !!}
        </div>
        {{-- Fecha entrada --}}
        <div class="form-group col-md-3">
            {!! Form::label('f_entrada', 'Fecha entrada:') !!}
            <div class="input-group datetime">
                {!! Form::text('f_entrada', isset($visita->f_entrada)  ? Carbon::parse($visita->f_entrada)->format('d-m-Y H:i:s'): null, ['class' => 'form-control','placeholder'=>'Fecha entrada...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>    
        {{-- Fecha salida --}}
        <div class="form-group col-md-3">
            {!! Form::label('f_salida', 'Fecha salida:') !!}
            <div class="input-group datetime">
                {!! Form::text('f_salida', isset($visita->f_salida)  ? Carbon::parse($visita->f_salida)->format('d-m-Y H:i:s'): null , ['class' => 'form-control' ,'placeholder'=>'Fecha salida...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div> 
    </div>
    <div class="row">
        {{-- Visitado_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('visitado_id', 'Visitado') !!}
            {!! Form::select('visitado_id', $nombreVisitado, null,['class' => 'form-control select']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>