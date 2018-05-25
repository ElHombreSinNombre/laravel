<div class="panel-body"> 
    <div class="row">
        {{-- Usuario --}}
        <div class="form-group col-md-4">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>