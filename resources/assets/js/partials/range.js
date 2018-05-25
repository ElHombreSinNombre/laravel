
$('.range').daterangepicker({
    startDate      : moment().subtract(29, 'days'),
    endDate        : moment(),
    format         : 'DD-MM-YYYY',
    autoUpdateInput: false,
    ranges         : {
        'Hoy'            : [moment(), moment()],
        'Ayer'           : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este mes'       : [moment().startOf('month'), moment().endOf('month')],
        'El mes anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(
            1, 'month').endOf('month')]
    },
    separator:' a ',
    buttonClasses: ['btn', 'btn-sm'],
    applyClass   : 'btn-primary',
    cancelClass  : 'btn-default',
    locale       : {
        applyLabel      : 'Aplicar',
        firstDay        : 1,
        monthNames      : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        daysOfWeek      : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        cancelLabel     : 'Cancelar',
        fromLabel       : 'Desde',
        toLabel         : 'Hasta',
        customRangeLabel: 'Elegir fecha'
    }
});

$('.range').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' a ' + picker.endDate.format('DD/MM/YYYY'));
});


$('.rangetime').daterangepicker({
    startDate      : moment().subtract(29, 'days'),
    endDate        : moment(),
    format         : 'DD-MM-YYYY H:mm:ss',
    timePicker: true,
    timePicker24Hour: true,
    timePickerSeconds: true,
    autoUpdateInput: false,
    ranges         : {
        'Hoy'            : [moment(), moment()],
        'Ayer'           : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este mes'       : [moment().startOf('month'), moment().endOf('month')],
        'El mes anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(
            1, 'month').endOf('month')]
    },
    separator:' a ',
    buttonClasses: ['btn', 'btn-sm'],
    applyClass   : 'btn-primary',
    cancelClass  : 'btn-default',
    locale       : {
        applyLabel      : 'Aplicar',
        firstDay        : 1,
        monthNames      : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        daysOfWeek      : ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        cancelLabel     : 'Cancelar',
        fromLabel       : 'Desde',
        toLabel         : 'Hasta',
        customRangeLabel: 'Elegir fecha'
    }
});

$('.rangetime').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY H:mm:ss') + ' a ' + picker.endDate.format('DD/MM/YYYY H:mm:ss'));
});