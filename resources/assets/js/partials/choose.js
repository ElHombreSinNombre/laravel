$("[name=activado]").bootstrapSwitch({
    'onColor': 'success',
    'onText': 'Activado',
    'offColor': 'danger',
    'offText': 'Desactivado',
});

/*$(":checkbox").on('switchChange.bootstrapSwitch', function () {
    var opcion = $(":checkbox").bootstrapSwitch('state');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'listado',
        type: 'POST',
        data: {'opcion': opcion},
    })
});*/