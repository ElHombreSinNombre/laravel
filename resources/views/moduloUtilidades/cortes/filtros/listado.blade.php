<h5><b>Filtros</b></h5>
{!! Form::open(['route' => 'cortes.listado']) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="container-fluid">
            <div class="form-row">
                {{-- Usuario --}}
                <div class="form-group col-md-4">
                    {!! Form::label('usuario', 'Usuario') !!}
                    {!! Form::text('usuario', null, ['class' => 'form-control','placeholder'=>'Usuario...']) !!}
                </div>
                {{-- Tipo --}}
                <div class="form-group col-md-4">
                    {!! Form::label('tipo', 'Tipo') !!}
                    {!! Form::text('tipo', null, ['class' => 'form-control','placeholder'=>'Tipo...']) !!}
                </div>
                {{-- Descripción --}}
                <div class="form-group col-md-4">
                    {!! Form::label('descrip', 'Descripción') !!}
                    {!! Form::text('descrip', null,['class' => 'form-control', 'placeholder'=>'Descripción...']) !!}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="form-row">
                {{-- Fecha comienzo --}}
                <div class="form-group col-md-4">
                {!! Form::label('f_entrada', 'Fecha comienzo:') !!}
                    <div class="input-group date">
                        {!! Form::text('f_entrada',  null, ['class' => 'form-control','placeholder'=>'Fecha comienzo...']) !!}
                        <span data-toggle="tooltip" data-placement="bottom" title="Seleccionar fecha" class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </div>
                </div>   
                {{-- Fecha final --}}
                <div class="form-group col-md-4">
                    {!! Form::label('f_final', 'Fecha final:') !!}
                    <div class="input-group date">
                        {!! Form::text('f_entrada', null, ['class' => 'form-control','placeholder'=>'Fecha final...']) !!}
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