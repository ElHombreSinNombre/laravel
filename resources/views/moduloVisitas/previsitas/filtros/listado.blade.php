<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'previsitas.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Nombre--}}
                <div class="form-group col-md-4">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre',null, ['class' => 'form-control','placeholder'=>'Nombre']) !!}
                </div>
                {{-- Empresa--}}
                <div class="form-group col-md-4">
                    {!! Form::label('empresa', 'Empresa') !!}
                    {!! Form::text('empresa', null, ['class' => 'form-control','placeholder'=>'Empresa']) !!}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="form-row">
                {{-- Visitado--}}
                <div class="form-group col-md-4">
                    {!! Form::label('visitado_id', 'Visita a...') !!}
                    {!! Form::select('visitado_id', $nombreVisitado, null, ['class' => 'form-control select']) !!}
                </div>
                {{-- Rango --}}
                <div class="col-md-4">
                    {!! Form::label('rango', 'Rango') !!}
                    <div class="input-group ">
                        {!! Form::text('rango', isset($visita->f_entrada)  ? Carbon::parse($visita->f_entrada)->format('d-m-Y'): null, ['class' => 'form-control rangetime','placeholder'=>'Rango de fechas...']) !!}
                        <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </div>  
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