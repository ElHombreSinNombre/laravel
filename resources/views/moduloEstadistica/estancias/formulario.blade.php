<div class="panel-body"> 
    <div class="row">
        {{-- Hasta --}}
        <div class="form-group col-md-4">
            {!! Form::label('hasta_fecha', 'Hasta') !!}
            <div class="input-group datetime">
                {!! Form::text('hasta_fecha', null, ['class' => 'form-control','placeholder'=>'Hasta...','required']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>  
        {{-- Mayor --}}
        <div class="form-group col-md-4">
            {!! Form::label('hasta_fecha', 'Mayor que...') !!}
            {!! Form::select('mayor',$mayor,null,['class'=>'form-control select','required']) !!}    
        </div> 
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>