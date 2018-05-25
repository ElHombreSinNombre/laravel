<h5><b>Filtros</b></h5>
{!! Form::open(['route'=>'informes.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Código --}}
                <div class="form-group col-md-4">
                    {!! Form::label('codigo', 'Código') !!}
                    {!! Form::text('codigo', null, ['placeholder'=>'Código', 'class' => 'form-control']) !!}
                </div>
                {{-- Reclamante --}}
                <div class="form-group col-md-4">
                    {!! Form::label('reclamante', 'Reclamante') !!}
                    {!! Form::text('reclamante', null, ['placeholder'=>'Reclamante', 'class' => 'form-control']) !!}
                </div>
                {{-- Fecha_recepcion--}}
                <div class="col-md-4">
                    {!! Form::label('fecha_recepcion', 'Fecha recepción') !!}
                    <div class="input-group">
                        {!! Form::text('fecha_recepcion', null, ['placeholder'=>'Fecha de recepción', 'class' => 'form-control range']) !!}
                        <span class="input-group-addon">
                            <span  data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>  
        <div class="container-fluid">
            <div class="form-row">
                {{-- Identificación--}}
                <div class="form-group col-md-4">
                    {!! Form::label('identificacion', 'Identificación') !!}
                    {!! Form::text('identificacion', null, ['placeholder'=>'Identificación', 'class' => 'form-control']) !!}
                </div>
                {{-- Tipo_operativa_id--}}
                <div class="form-group col-md-4">
                    {!! Form::label('tipo_operativa_id', 'Tipo operativa') !!}
                    {!! Form::select('tipo_operativa_id', $nombreOperativa, null, ['class' => 'form-control select']) !!}
                </div>
                {{-- Fecha_siniestro--}}
                <div class="col-md-4">
                    {!! Form::label('fecha_siniestro', 'Fecha siniestro') !!}
                    <div class="input-group">
                        {!! Form::text('fecha_siniestro', null, ['placeholder'=>'Fecha siniestro', 'class' => 'form-control range']) !!}
                        <span class="input-group-addon">
                            <span  data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">  
            <div class="form-row">
                {{-- Tipo_poliza_id--}}
                <div class="form-group col-md-4">
                    {!! Form::label('tipo_poliza_id', 'Tipo poliza') !!}
                    {!! Form::select('tipo_poliza_id', $nombrePoliza, null, ['class' => 'form-control select']) !!}
                </div>
                {{-- Tipo_objeto_Siniestro_id--}}
                <div class="form-group col-md-4">
                    {!! Form::label('tipo_objeto_siniestro_id', 'Tipo objeto') !!}
                    {!! Form::select('tipo_objeto_siniestro_id', $nombreObjeto, null, ['class' => 'form-control select']) !!}
                </div>
                {{-- Estado--}}
                <div class="form-group col-md-4">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', [null=>null,'A'=>'Abierto', 'C'=>'Cerrado'],null, ['class' => 'form-control select']) !!}
                </div>
            </div>
        </div>   
        <div class="container-fluid">  
            <div class="form-row">
            {{-- Elemento--}}
                <div class="form-group col-md-4">
                    {!! Form::label('elemento', 'Elemento') !!}
                    {!! Form::text('elemento', null, ['placeholder'=>'Elemento', 'class' => 'form-control']) !!}
                </div>
                {{-- Maquina_id--}}
                <div class="form-group col-md-4">
                    {!! Form::label('maquina_id', 'Máquina') !!}
                    {!! Form::select('maquina_id', $nombreMaquina,null, ['class' => 'form-control select']) !!}
                </div>
                {{-- Buscar--}}
                <div class="form-group col-md-2">
                    {!! Form::label('buscar', 'Buscar') !!}
                    {!! Form::button('<i class="fa fa-search"></i> Buscar', ['type'=>'submit','class' => 'form-control  btn btn-primary'])!!} 
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}