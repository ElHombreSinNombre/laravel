<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'operaciones.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Expediente_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('codigo', 'Código Exp.') !!}
                    {!! Form::text('codigo', null, ['class' => 'form-control','placeholder'=>'Código Exp....']) !!}
                </div>
                {{-- Fecha --}}
                <div class="form-group col-md-3">
                    {!! Form::label('fecha', 'Fecha') !!}
                    <div class="input-group date">
                        {!! Form::text('fecha',  null , ['class' => 'form-control' ,'placeholder'=>'Fecha...']) !!}
                        <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </div>
                </div> 
                {{-- Cliente_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('cliente_id', 'Cliente') !!}
                    {!! Form::select('cliente_id', $nombreCliente, null,['class' => 'form-control select']) !!}
                </div>
                {{-- Numero_documento_aduana_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('numero_documento_aduana_id', 'Núm. DUA') !!}
                    {!! Form::text('numero_documento_aduana_id', null, ['class' => 'form-control','placeholder'=>'Número documento aduana....']) !!}
                </div>
            </div>
            <div class="form-row">
                {{-- Operacion_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('tipo_operacion_id', 'Tipo operación') !!}
                    {!! Form::select('tipo_operacion_id', $tipoOperacion, null,['class' => 'form-control select']) !!}
                </div>
                {{-- Transporte --}}
                <div class="form-group col-md-3">
                    {!! Form::label('transporte', 'Transporte') !!}
                    {!! Form::text('transporte', null, ['class' => 'form-control','placeholder'=>'Transporte....']) !!}
                </div>
                {{-- Tipo_unidad_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('tipo_unidad_id', 'Tipo unidad') !!}
                    {!! Form::select('tipo_unidad_id', $tipoUnidad, null,['class' => 'form-control select']) !!}
                </div>
                {{-- Unidades --}}
                <div class="form-group col-md-3">
                    {!! Form::label('unidades', 'Unidades') !!}
                    {!! Form::number('unidades', null, ['class' => 'form-control','placeholder'=>'Unidades....']) !!}
                </div>
            </div>
            <div class="form-row">
                 {{-- Importe --}}
                <div class="form-group col-md-3">
                    {!! Form::label('importe', 'Importe') !!}
                    {!! Form::number('importe', null, ['class' => 'form-control','placeholder'=>'Importe....']) !!}
                </div>
                {{-- Tipo_documento_aduana_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('tipo_documento_aduana_id', 'Tipo DUA') !!}
                    {!! Form::select('tipo_documento_aduana_id', $tipoDocumento, null,['class' => 'form-control select']) !!}
                </div>
                {{-- Rango --}}
                <div class="col-md-3">
                    {!! Form::label('rango', 'Rango') !!}
                    <div class="input-group ">
                        {!! Form::text('rango', isset($operacion->fecha)  ? Carbon::parse($operacion->fecha)->format('d-m-Y'): null, ['class' => 'form-control rangetime','placeholder'=>'Rango de fechas...']) !!}
                        <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </div>  
                </div>
            </div>
            <div class="form-row">
                {{-- Buscar--}}
                <div class="form-group col-md-2">
                    {!! Form::label('buscar', 'Buscar') !!}
                    {!! Form::button('<i class="fa fa-search"></i> Buscar', ['type'=>'submit','class' => 'form-control  btn btn-primary'])!!} 
                </div>
            </div>  
        </div>
    </div>
{!! Form::close() !!}