<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'clientes.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Nombre --}}
                <div class="form-group col-md-3">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre...']) !!}
                </div>
                {{-- Empresa --}}
                <div class="form-group col-md-3">
                    {!! Form::label('persona_contacto', 'Persona contacto') !!}
                    {!! Form::text('persona_contacto', null, ['class' => 'form-control','placeholder'=>'Persona contacto...']) !!}
                </div>
                {{-- Empresa --}}
                <div class="form-group col-md-3">
                    {!! Form::label('telefono_contacto', 'Teléfono contacto') !!}
                    {!! Form::tel('telefono_contacto', null, ['class' => 'form-control','placeholder'=>'Teléfono contacto...']) !!}
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