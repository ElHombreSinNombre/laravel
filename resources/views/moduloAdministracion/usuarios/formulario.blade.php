<div class="panel-body"> 
    <div class="row">
        {{-- Usuario --}}
        <div class="form-group col-md-4">
            {!! Form::label('user_name', 'Usuario:') !!}
            {!! Form::text('user_name', null, ['class' => 'form-control','placeholder'=>'Usuario...']) !!}
        </div>
        {{-- Password --}}
         <div class="form-group col-md-4">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', null, ['class' => 'form-control','placeholder'=>'Password...']) !!}
        </div>
         {{-- Departamento_id --}}
         <div class="form-group col-md-4">
            {!! Form::label('department_id', 'Departamento') !!}
            {!! Form::select('department_id', $nombreDepartamento, isset($usuario->departamento->departamento) ? $usuario->departamento->departamento : null,['class' => 'form-control select']) !!}
        </div>
    </div>
     <div class="row">
        {{--Nombre --}}
        <div class="form-group col-md-4">
            {!! Form::label('nombre', 'Nombre:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
        {{--Apellido --}}
         <div class="form-group col-md-4">
            {!! Form::label('apellido', 'Apellido:') !!}
            {!! Form::text('apellido', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
        </div>
        {{--Grabar --}}
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>