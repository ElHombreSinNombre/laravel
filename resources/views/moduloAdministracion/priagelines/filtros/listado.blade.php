<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'priagelines.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Modulo--}}
                <div class="form-group col-md-4">
                    {!! Form::label('modulo', 'Módulo') !!}
                    {!! Form::text('modulo',null, ['class' => 'form-control','placeholder'=>'Módulo...']) !!}
                </div>
                {{-- Cliente--}}
                <div class="form-group col-md-4">
                    {!! Form::label('cliente', 'Cliente') !!}
                    {!! Form::text('cliente', null, ['class' => 'form-control','placeholder'=>'Cliente...']) !!}
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