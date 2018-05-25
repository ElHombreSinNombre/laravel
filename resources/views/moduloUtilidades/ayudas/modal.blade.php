<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ayuda</title>
</head>
<body>
    <div class="modal-header">
        <h4 class="modal-title">Ayuda</h4>
    </div>
    <div class="modal-body" >
        {!! isset ($descripcion) ?  html_entity_decode($descripcion) : 'No hay ayudas' !!}
    </div>
    <div class="modal-footer">
        {!! Form::button('Salir', ['class' => 'btn btn-default','data-dismiss'=>'modal']) !!}
    </div>
</body>
</html>