<div class="panel-body"> 
    <div class="row">
        {{-- Código --}}
        <div class="form-group col-md-4">
            {!! Form::label('codigo', 'Código:') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control','placeholder'=>'Código...']) !!}
        </div>
        {{-- Propietario --}}
        <div class="form-group col-md-4">
            {!! Form::label('propietario', 'Propietario:') !!}
            {!! Form::text('propietario', null, ['class' => 'form-control','placeholder'=>'Propietario...']) !!}
        </div>
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>