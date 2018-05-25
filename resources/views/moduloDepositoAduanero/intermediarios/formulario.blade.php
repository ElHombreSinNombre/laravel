<div class="panel-body"> 
    <div class="row">
        {{-- Nombre --}}
        <div class="form-group col-md-4">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>