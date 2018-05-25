<div class="panel-body"> 
    <div class="row">
        {{-- Nombre --}}
        <div class="form-group col-md-4">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
        {{-- Empresa --}}
         <div class="form-group col-md-4">
            {!! Form::label('ubicacion', 'Ubicación:') !!}
            {!! Form::text('ubicacion', null, ['class' => 'form-control','placeholder'=>'Ubicación...']) !!}
        </div>
       {{-- Mac --}}
       <div class="form-group col-md-4">
            {!! Form::label('mac', 'Mac:') !!}
            {!! Form::text('mac', null, ['class' => 'form-control','placeholder'=>'Mac...']) !!}
        </div>
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>