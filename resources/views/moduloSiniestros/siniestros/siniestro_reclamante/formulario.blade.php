{{-- ID Reclamante --}}
<div class="form-group col-md-4">
    {!! Form::label('reclamante_id', 'Reclamante') !!}
    {!! Form::select('reclamante_id', $nombreReclamante, null, ['class' => 'form-control select' ]) !!}
</div>
{{-- Observaciones --}}
<div class="form-group col-md-4">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control','placeholder'=>'Observaciones,,,' ]) !!}
</div>
<div class="form-group col-md-12">
    {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
    {!! Form::button('Cancelar', ['class' => 'btn btn-default','data-dismiss'=>'modal']) !!}
</div>
{{-- ID Siniestro --}}
{!! Form::text('siniestro_id', $id , ['class' => 'form-control','style'=>'visibility:hidden']) !!}