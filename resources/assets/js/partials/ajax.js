$('body').on('ifChanged', "[data-click='permisos']", function() {
    var department_id= $(this).val();
    var security_element_id= $(this).data("valuetwo");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'permisos/guardar',
        type: 'post',
        data: {departments_id:department_id, security_element_id: security_element_id},
        success: function () {
            swal({
                title: "El elemento ha sido modificado satisfactoriamente.",
                icon: "success",
                button: "Aceptar"
            }); 
        },
        error: function (error) {
            console.log(error);
            swal({
                title: "No se ha podido modificar el elemento.",
                icon: "warning",
                button: "Aceptar",
            })
        }
    });
}); 