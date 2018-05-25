<div class="panel-body"> 
    <div class="row">
        {{-- Rango --}}
        <div class="col-md-3">
            {!! Form::label('rango', 'Rango') !!}
            <div class="input-group ">
                {!! Form::text('rango', null, ['class' => 'form-control rangetime','placeholder'=>'Rango de fechas...','required']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>  
        </div> 
        {{-- Cntr_no --}}
        <div class="form-group col-md-3">
            {!! Form::label('Cntr_no', 'Contenedor') !!}
            {!! Form::text('cntr_no',null,['class'=>'form-control','placeholder'=>'Cntr No...']) !!}    
        </div> 
        {{-- Vsl_cd --}}
        <div class="form-group col-md-3">
            {!! Form::label('vsl_cd', 'Buque') !!}
            {!! Form::select('vsl_cd', isset($buque) ? $buque : [''=>''] ,null , ['class' => 'form-control select'])!!}  
        </div> 
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>