<div class="panel-body"> 
    <div class="row">
        {{-- Código --}}
        <div class="form-group col-md-3">
            {!! Form::label('codigo', 'Código:') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control','placeholder'=>'Código...']) !!}
        </div>
        {{-- Identificación --}}
         <div class="form-group col-md-3">
            {!! Form::label('identificacion', 'Identificación:') !!}
            {!! Form::text('identificacion', null, ['class' => 'form-control','placeholder'=>'Identificación...']) !!}
        </div>
        {{-- Fecha recepción --}}
        <div class="form-group col-md-3">
        {!! Form::label('fecha_recepcion', 'Fecha recepción:') !!}
            <div class="input-group date"> 
                {!! Form::text('fecha_recepcion', isset($siniestro->fecha_recepcion)  ? Carbon::parse($siniestro->fecha_recepcion)->format('d-m-Y'): null, ['class' => 'form-control','placeholder'=>'Fecha recepción...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>    
         {{-- Fecha siniestro --}}
        <div class="form-group col-md-3">
        {!! Form::label('fecha_siniestro', 'Fecha siniestro:') !!}
            <div class="input-group date">
                {!! Form::text('fecha_siniestro', isset($siniestro->fecha_siniestro)  ? Carbon::parse($siniestro->fecha_siniestro)->format('d-m-Y'): null , ['class' => 'form-control' ,'placeholder'=>'Fecha siniestro...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div> 
    </div>
    <div class="row">
        {{-- Estado --}}
        <div class="form-group col-md-3">
            {!! Form::label('estado', 'Estado') !!}
            {!! Form::select('estado', [null=>null, 'A'=>'Abierto', 'C'=>'Cerrado'], null,['class' => 'form-control select']) !!}
        </div>
        {{-- Tipo_poliza_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('tipo_poliza_id', 'Tipo póliza') !!}
            {!! Form::select('tipo_poliza_id', $nombrePoliza , null,  ['class' => 'form-control select' ]) !!}
        </div>
        {{-- Tipo_operativa_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('tipo_operativa_id', 'Tipo operativa') !!}
            {!! Form::select('tipo_operativa_id', $nombreOperativa ,null,  ['class' => 'form-control select' ]) !!}
        </div>
        {{-- Maquina_id --}}
        <div class="form-group col-md-3">
            {!! Form::label('maquina_id', 'Máquina') !!}
            {!! Form::select('maquina_id', $nombreMaquina, null,  ['class' => 'form-control select' ]) !!}
        </div>   
    </div>
    <div class="row">
        {{-- Tipo_objeto_siniestro_id --}}
        <div class="form-group col-md-6">
            {!! Form::label('tipo_objeto_siniestro_id', 'Objeto') !!}
            {!! Form::select('tipo_objeto_siniestro_id', $nombreObjeto ,null,  ['class' => 'form-control select' ]) !!}
        </div>
        {{-- Path_documentation --}}
        <div class="form-group col-md-6">
            {!! Form::label('path_documentacion', 'Ruta de documentación:') !!}
            {!! Form::text('path_documentacion', null, ['class' => 'form-control path','placeholder'=>'Ruta documentación...']) !!}
        </div>
    </div>
    <div class="row">
        {{-- Pago_seguro --}}
        <div class="form-group col-md-3">
            {!! Form::label('pago_seguro', 'Pago seguro:') !!}
            {!! Form::number('pago_seguro', null, ['class' => 'form-control','min'=>'0','step' =>'.01','placeholder'=>'Pago seguro...']) !!}
        </div>
        {{-- Pago_previsto --}}
        <div class="form-group col-md-3">
            {!! Form::label('pago_previsto', 'Pago previsto:') !!}
            {!! Form::number('pago_previsto', null, ['class' => 'form-control','min'=>'0','step' =>'.01','placeholder'=>'Pago previsto...']) !!}
        </div>
        {{-- Pago_realizado --}}
        <div class="form-group col-md-3">
            {!! Form::label('pago_realizado', 'Pago realizado:') !!}
            {!! Form::number('pago_realizado', null, ['class' => 'form-control','min'=>'0','step' =>'.01','placeholder'=>'Pago realizado...']) !!}
        </div>
        {{-- Importe --}}
        <div class="form-group col-md-3">
            {!! Form::label('Importe total', 'Importe total:') !!}
            {!! Form::number('importe', null, ['class' => 'form-control','readonly','placeholder'=>'0.00€' ]) !!}
        </div>
    </div>
    <div class="row">
        {{-- Descripción --}}
        <div class="form-group col-md-6">
            {!! Form::label('descripcion', 'Descripción:') !!}
            {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => 5,'placeholder'=>'Descripción...']) !!}
        </div>
        {{-- Notas --}}
        <div class="form-group col-md-6">
            {!! Form::label('notas', 'Notas:') !!}
            {!! Form::textarea('notas', null, ['class' => 'form-control','rows' => 5,'placeholder'=>'Notas...']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
    @if (isset($reclamantes) || isset ($danios))
        <div class="row">
            <dic class="col-md-12">
                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation">
                            <a href="#reclamantes" aria-controls="reclamantes" role="tab" data-toggle="tab">Reclamantes</a>
                        </li>
                        <li role="presentation" >
                            <a href="#elementos_danados" aria-controls="elementos_danados" role="tab" data-toggle="tab">Elementos Dañados</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="reclamantes">   
                            @if($reclamantes->isEmpty()) 
                                <div class="well text-center">No se han encontrado datos.</div>
                            @else
                                <table class="table table-hover table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Reclamante</th>
                                            <th>Observaciones</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reclamantes as $reclamante)
                                            <tr>
                                                <td>{{$reclamante->nombre}}</td>
                                                <td>{{$reclamante->observaciones}}</td>
                                                <td><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></a></td>
                                            </tr>
                                        @endforeach           
                                    </tbody>
                                </table>
                                @if($siniestro)
                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right" 
                                        href="{!! route('siniestro.reclamante.create',$siniestro->id) !!}">Nuevo Reclamante</a>
                                @else
                                    <a class="btn btn-primary readonly pull-right" 
                                        href="{!! route('siniestro.reclamante.create') !!}">Nuevo Reclamante</a>
                                @endif
                            @endif
                        </div>
                        <div role="tabpanel" class="tab-pane" id="elementos_danados">  
                            @if($danios->isEmpty()) 
                                <div class="well text-center">No se han encontrado datos.</div>
                            @else      
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Elemento dañado</th>
                                            <th>Observaciones</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danios as $danio)
                                        <tr>
                                            <td>{{$danio->nombre}}</td>
                                            <td>{{$danio->observaciones}}</td>
                                            <td><a data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                                @if($siniestro)
                                    <a data-toggle="modal" data-target="#myModal" class=" btn btn-primary pull-right" 
                                    href="{!! route('siniestro.danio.create',$siniestro->id) !!}">Nuevo elemento dañado</a>
                                @else
                                    <a class="btn btn-primary readonly pull-right" 
                                    href="{!! route('siniestro.danio.create') !!}">Nuevo elemento dañado</a>
                                @endif
                            @endif
                        </div>  
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>

{{-- Modal--}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@endif
