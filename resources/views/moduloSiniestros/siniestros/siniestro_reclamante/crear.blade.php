<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar reclamante</title>
</head>
<body>
    <div class="panel-body">
        <div class="panel-heading"><h5><b>Nuevo reclamante</b></h5></div>
        {!! Form::open(['route' => 'siniestro.reclamante.store']) !!}
            @include('moduloSiniestros.siniestros.siniestro_reclamante.formulario')
        {!! Form::close() !!}
    </div>
</body>
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/bootstrap/3.3.5/bootstrap.min.js')}}" type="text/javascript" ></script>
</html>