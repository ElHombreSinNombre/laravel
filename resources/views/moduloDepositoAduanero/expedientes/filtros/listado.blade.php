<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'expedientes.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
               {{-- Código --}}
                <div class="form-group col-md-3">
                    {!! Form::label('codigo', 'Código:') !!}
                    {!! Form::text('codigo', null, ['class' => 'form-control','placeholder'=>'Código...']) !!}
                </div>
                 {{-- Fecha Apertura --}}
                <div class="form-group col-md-3">
                    {!! Form::label('fecha_apertura', 'Fecha apertura:') !!}
                    <div class="input-group date">
                        {!! Form::text('fecha_apertura',  null, ['class' => 'form-control' ,'placeholder'=>'Fecha apertura...']) !!}
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
                {{-- Intermediario_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('intermediario_id', 'Intermediario') !!}
                    {!! Form::select('intermediario_id', $nombreIntermediario, null,['class' => 'form-control select']) !!}
                </div>
            </div>
            <div class="form-row">
               {{-- Descripcion_mercancia --}}
                <div class="form-group col-md-3">
                    {!! Form::label('descripcion_mercancia', 'Descripción mercancia:') !!}
                    {!! Form::text('descripcion_mercancia', null, ['class' => 'form-control','placeholder'=>'Descripción mercancia....']) !!}
                </div>
               {{-- Referencia_ATM --}}
                <div class="form-group col-md-3">
                    {!! Form::label('referencia_atm', 'Referencia ATM:') !!}
                    {!! Form::text('referencia_atm', null,['class' => 'form-control','placeholder'=>'Referencia ATM....']) !!}
                </div>
                  {{-- Tipo_documento_aduana_id --}}
                <div class="form-group col-md-3">
                    {!! Form::label('tipo_documento_aduana_id', 'Tipo DUA') !!}
                    {!! Form::select('tipo_documento_aduana_id', $tipoDocumento, null,['class' => 'form-control select']) !!}
                </div>
                {{-- Numero_documento_aduana --}}
                <div class="form-group col-md-3">
                    {!! Form::label('num_documento_aduana', 'Núm. DUA') !!}
                    {!! Form::text('num_documento_aduana', null, ['class' => 'form-control','placeholder'=>'Número documento aduana....']) !!}
                </div>
            </div>
            <div class="form-row">
                {{-- Deposito --}}
                <div class="form-group col-md-3">
                    {!! Form::label('deposito_id', 'Tipo Dep.') !!}
                    {!! Form::select('deposito_id',[null=>null,'1'=>'DA','2'=>'DDA'],null, ['class' => 'form-control select']) !!}
                </div>
                {{-- Rango --}}
                <div class="col-md-3">
                    {!! Form::label('rango', 'Rango') !!}
                    <div class="input-group ">
                        {!! Form::text('rango', isset($expediente->f_entrada)  ?  Carbon::parse($expediente->f_entrada)->format('d-m-Y'): null, ['class' => 'form-control rangetime','placeholder'=>'Rango de fechas...']) !!}
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