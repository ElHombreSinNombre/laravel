<div class="panel-body"> 
    <div class="row">
        {{-- Módulo --}}
        <div class="form-group col-md-3">
            {!! Form::label('modulo', 'Módulo:') !!}
            {!! Form::text('modulo', null, ['class' => 'form-control','placeholder'=>'Módulo...']) !!}
        </div>  
        {{-- Grupo --}}
        <div class="form-group col-md-3">
            {!! Form::label('grupo', 'Grupo:') !!}
            {!! Form::text('grupo', null, ['class' => 'form-control','placeholder'=>'Grupo...']) !!}
        </div>
        {{-- Opción --}}
          <div class="form-group col-md-3">
            {!! Form::label('opcion', 'Opción:') !!}
            {!! Form::text('opcion', null, ['class' => 'form-control','placeholder'=>'Opción...']) !!}
        </div>  
        {{-- Subopción --}}
        <div class="form-group col-md-3">
            {!! Form::label('subopcion', 'Subopción:') !!}
            {!! Form::text('subopcion', null, ['class' => 'form-control','placeholder'=>'Subopción...']) !!}
        </div>  
    </div>
    <div class="row">
        {{-- Ruta --}}
        <div class="form-group col-md-12">
            {!! Form::label('ruta', 'Ruta:') !!}
            {!! Form::text('ruta', null, ['class' => 'form-control','placeholder'=> 'Ruta. Ejemplo: '. Request::path()]) !!}
        </div> 
    </div>
    <div class="row">
        {{-- Descripción --}}
        <div class="form-group col-md-12">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::textarea('descripcion', isset($ayuda->descripcion) ? htmlentities($ayuda->descripcion): null,['class' => 'form-control wysiwyg', 'placeholder'=>'Descripción...']) !!}
        </div>
    </div>
    <div class="row">   
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>