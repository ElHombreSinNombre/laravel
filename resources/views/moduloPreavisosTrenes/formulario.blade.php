<div class="col-md-12">
<div class="row">
    <div class="form-group">
    {!! Form::open(['class'=>'dropzone']) !!}
        {{-- Archivo --}}
        <div class="dz-message text-center" data-dz-message><span><h4>Arrastra/selecciona un archivo</h4></span></div>
            <div class="dz-message text-center" data-dz-message><span><h5>Pinche <b>aquí</b> para seleccionar un archivo</h5></span></div>
            <div class="fallback">
                {!!Form::file('file',['required'])!!}
            </div>  
        </div>   
        <div class="form-group">
            {!!Form::select('opcion', [], null,['class' => 'form-control','required']) !!} 
        </div>
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    </div>
</div>

