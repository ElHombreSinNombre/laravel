<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'usuarios.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Nombre--}}
                <div class="form-group col-md-4">
                    {!! Form::label('user_name', 'Usuario') !!}
                    {!! Form::text('user_name',null, ['class' => 'form-control','placeholder'=>'Usuario']) !!}
                </div>
                {{-- Empresa--}}
                <div class="form-group col-md-4">
                    {!! Form::label('department_id', 'Departamento') !!}
                    {!! Form::text('department_id', null, ['class' => 'form-control','placeholder'=>'Departamento']) !!}
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