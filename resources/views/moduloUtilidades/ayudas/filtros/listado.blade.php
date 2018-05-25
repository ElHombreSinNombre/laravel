<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'ayudas.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Módulo --}}
                <div class="form-group col-md-3">
                    {!! Form::label('modulo', 'Módulo:') !!}
                    {!! Form::text('modulo', null, ['class' => 'form-control','placeholder'=>'Módulo...']) !!}
                </div>  
                {{-- Grupo --}}
                <div class="form-group col-md-3">
                    {!! Form::label('grupo', 'Grupo:') !!}
                    {!! Form::text('grupo', null, ['class' => 'form-control','placeholder'=>'Grupo...']) !!}
                </div> 
                {{-- Opción --}}
                <div class="form-group col-md-3">
                    {!! Form::label('opcion', 'Opción:') !!}
                    {!! Form::text('opcion', null, ['class' => 'form-control','placeholder'=>'Opción...']) !!}
                </div> 
                {{-- Subopción --}}
                <div class="form-group col-md-3">
                    {!! Form::label('subopcion', 'Subopción:') !!}
                    {!! Form::text('subopcion', null, ['class' => 'form-control','placeholder'=>'Subopción...']) !!}
                </div> 
            </div>
        </div>
        <div class="container-fluid">
            <div class="form-row"> 
                {{-- Buscar--}}
                <div class="form-group col-md-2">
                    {!! Form::label('buscar', 'Buscar') !!}
                    {!! Form::button('<i class="fa fa-search"></i> Buscar', ['type'=>'submit','class' => 'form-control  btn btn-primary'])!!} 
                </div>
            </div>  
        </div>
    </div>
{!! Form::close() !!}