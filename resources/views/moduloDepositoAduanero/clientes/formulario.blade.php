<div class="panel-body"> 
    <div class="row">
        {{-- Nombre --}}
        <div class="form-group col-md-4">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
        {{-- Persona contacto--}}
         <div class="form-group col-md-4">
            {!! Form::label('persona_contacto', 'Persona contacto:') !!}
            {!! Form::text('persona_contacto', null, ['class' => 'form-control','placeholder'=>'Persona contacto...']) !!}
        </div>
         {{-- Telefóno contacto --}}
         <div class="form-group col-md-4">
            {!! Form::label('telefono_contacto', 'Teléfono contacto:') !!}
            {!! Form::text('telefono_contacto', null, ['class' => 'form-control','placeholder'=>'Teléfono contacto...']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>