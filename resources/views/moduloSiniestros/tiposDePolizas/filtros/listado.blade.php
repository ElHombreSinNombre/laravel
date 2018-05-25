<h5><b>Filtros</b></h5>
{!! Form::open(['route'=>'polizas.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Nombre--}}
                <div class="form-group col-md-4">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::select('nombre', $nombrePoliza, null, ['class' => 'form-control select']) !!}
                </div>
                 {{-- Buscar--}}         
                <div class="form-group col-md-2">
                    {!! Form::label('buscar', 'Buscar') !!}
                    {!! Form::button('<i class="fa fa-search"></i> Buscar', ['type'=>'submit','class' => 'form-control  btn btn-primary'])!!} 
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}