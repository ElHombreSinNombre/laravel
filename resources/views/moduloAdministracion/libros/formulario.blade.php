<div class="panel-body"> 
    {!! Form::model($libro, ['route' => ['libros.update', $libro->id], 'method' => 'patch']) !!}
        <div class="row">
            {{-- Código--}}
            <div class="form-group col-md-4">
                {!! Form::label('codigo', 'Código') !!}
                {!! Form::text('codigo',null, ['class' => 'form-control','placeholder'=>'Código...','readonly']) !!}
            </div>
            {{-- Nombre--}}
            <div class="form-group col-md-4">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre...','readonly']) !!}
            </div>
            {{-- Email--}}
            <div class="form-group col-md-4">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control','placeholder'=>'Email...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="btn-toolbar inline col-md-12">
                {!! Form::submit('Grabar', ['class' => 'btn btn-primary']) !!}
                {!! Form::reset('Cancelar', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <th>Descripción</th>
            <th>Campo 1</th>
            <th>Campo 2</th>
            <th>Periocidad</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach ($programadores as $programador)
                <tr>
                    <td>{!!$programador->tipoProgramador_programador->descrip !!}</td>
                    <td>{!!$programador->campo1!!}</td>
                    <td>{!!$programador->campo2!!}</td>  
                    @if ($programador->periodicidad==1)
                        <td>Diario</td>
                    @elseif ($programador->periodicidad==2)
                        <td>Semanal</td>
                    @elseif ($programador->periodicidad==3)
                        <td>Mensual</td>
                    @else
                        <td>No asignado</td>
                    @endif        
                    <td><a data-toggle="tooltip" data-placement="top" title="Eliminar" data-click="delete" data-elemento="{{$programador->codigo}}" data-route="{{route('libros.delete', [$programador->id])}}"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>         
    <div class="text-center">{{ $programadores->links() }}</div>
    <div class="pull-right"><a  data-toggle="modal" data-target="#myModal"  href="{{route('libros.create',[$programador->id])}}" class="form-control  btn btn-primary"><i class="fa fa-plus"> Nueva programación</i></a></div>
    @include('dashboard.partials.modal')
</div>