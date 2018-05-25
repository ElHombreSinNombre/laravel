<div class="panel-body"> 
    <div class="row">
         {{-- Trk_in_date --}}
         <div class="form-group col-md-4">
            {!! Form::label('trk_in_date', 'Desde') !!}
            <div class="input-group datetime">
                {!! Form::text('trk_in_date', null, ['class' => 'form-control','placeholder'=>'Desde...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>  
        {{-- Trk_out_date --}}
        <div class="form-group col-md-4">
            {!! Form::label('trk_out_date', 'Hasta:') !!}
            <div class="input-group datetime">
                {!! Form::text('trk_out_date', null, ['class' => 'form-control','placeholder'=>'Hasta...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>    
        <div class="btn-toolbar inline col-md-12">
            @if($contar>0)
                {!! Form::submit('Insertar', ['class' => 'btn btn-danger','data-toggle'=>'tooltip' ,'data-placement'=>'top','title'=>'Los registros se sobreescribirán']) !!}
            @else
                {!! Form::submit('Insertar', ['class' => 'btn btn-primary']) !!}
            @endif
                {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>