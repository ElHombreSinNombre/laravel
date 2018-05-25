import { ESPIPE } from "constants";

$('select').select2({
    placeholder: "Selecciona una opción...",
    theme: "bootstrap",
    allowClear: true,
    dropdownAutoWidth:true,
    language: "es"
});

$('select-icono').select2({
    placeholder: "Selecciona una opción...",
    theme: "bootstrap",
    dropdownAutoWidth:true,
    templateSelection: formato,
    templateResult: formato,
    allowHtml: true,
    language: "es"
});

function formato(icono) {
    return $('<span><i class="fa ' + $(icono.element).data('icono') + '"></i> ' + icono.text + '</span>');
}