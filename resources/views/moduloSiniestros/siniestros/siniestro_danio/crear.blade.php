<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar daño</title>
</head>
<body>
    <div class="panel-body">
        <div class="panel-heading"><h5><b>Nuevo daño</b></h5></div>
        {!! Form::open(['route' => 'siniestro.danio.store']) !!}
            @include('moduloSiniestros.siniestros.siniestro_danio.formulario')
        {!! Form::close() !!}
    </div>
</body>
    <script src="{{asset('/js/partials/select2.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select2_es.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/partials/select.js') }}" type="text/javascript"></script> 
    <script src="{{asset('/js/bootstrap/3.3.5/bootstrap.min.js')}}" type="text/javascript" ></script>
</html>