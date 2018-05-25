<div class="panel-body"> 
    <div class="row">
         {{-- Tipo --}}
        <div class="form-group col-md-4">
            {!! Form::label('tipo', 'Tipo:') !!}
            {!! Form::text('tipo', null, ['class' => 'form-control','placeholder'=>'Tipo...']) !!}
        </div>  
        {{-- Usuario --}}
        <div class="form-group col-md-4">
            {!! Form::label('usuario', 'Usuario:') !!}
            {!! Form::text('usuario', null, ['class' => 'form-control','placeholder'=>'Usuario...']) !!}
        </div>
        {{-- Descripción --}}
          <div class="form-group col-md-4">
            {!! Form::label('descrip', 'Descripción:') !!}
            {!! Form::text('descrip', null, ['class' => 'form-control','placeholder'=>'Descripción...']) !!}
        </div>  
    </div>
    <div class="row">
        {{-- Fecha comienzo --}}
        <div class="form-group col-md-4">
            {!! Form::label('f_entrada', 'Fecha comienzo:') !!}
            <div class="input-group date">
                {!! Form::text('f_entrada', isset($corte->f_comienzo)  ? Carbon::parse($corte->f_comienzo)->format('d-m-Y'): null, ['class' => 'form-control','placeholder'=>'Fecha comienzo...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>   
        {{-- Fecha final --}}
        <div class="form-group col-md-4">
            {!! Form::label('f_final', 'Fecha final:') !!}
            <div class="input-group date">
                {!! Form::text('f_final', isset($corte->f_final)  ? Carbon::parse($corte->f_final)->format('d-m-Y'): null, ['class' => 'form-control','placeholder'=>'Fecha final...']) !!}
                <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="btn-toolbar inline col-md-12">
            {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
            {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
        </div>
    </div>
</div>