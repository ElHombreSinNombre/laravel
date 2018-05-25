<div class="col-md-12">
<div class="row">
    {!! Form::open([]) !!}
        {{-- Opcion --}}
        <div class="form-group">
            {!! Form::select('opcion', [], null,['class' => 'form-control select-cargadescarga','required']) !!}
        </div>
        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>