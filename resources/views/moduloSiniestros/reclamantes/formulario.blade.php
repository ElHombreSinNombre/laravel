<div class="panel-body"> 
    <div class="row">
        {{-- Código --}}
        <div class="form-group col-md-4">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::select('nombre', $nombreReclamante, null, ['class' => 'form-control select']) !!}
        </div>
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>  
</div>