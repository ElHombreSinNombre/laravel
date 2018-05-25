<div class="panel-body"> 
    <div class="row">
        {{-- Código --}}
        <div class="form-group col-md-4">
            {!! Form::label('codigo', 'Código:') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control','placeholder'=>'Código...']) !!}
        </div>
        {{-- Operador --}}
        <div class="form-group col-md-4">
            {!! Form::label('operador', 'Operador:') !!}
            {!! Form::text('operador', null, ['class' => 'form-control','placeholder'=>'Operador...']) !!}
        </div>
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>