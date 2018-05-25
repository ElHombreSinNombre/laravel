$('body').on('click', '[data-click="delete"]', function () {
    var elemento= $(this).data("elemento");
    swal({
        title: "¿Está seguro que desea eliminar '" + elemento + "'?",
        icon: "warning",
        dangerMode: true,
        buttons: ["Cancelar", "Eliminar"],
    })
    .then((remove) => {
        if (remove) {
            $.ajax({
                type: 'GET',
                url: $(this).data("route"),
                success: function () {
                    swal({
                        title: "'" + elemento + "' ha sido eliminado satisfactoriamente.", 
                        icon: "success",
                        button: "Aceptar",
                    }).then((confirm) => {
                        if (confirm) {
                            window.location.reload();
                        }
                    })
                },
                error: function (error) {
                    console.log(error);
                    swal({
                        title: "Hay un elemento relacionado con '" + elemento + "'. No se ha podido eliminar.",
                        icon: "info",
                        button: "Aceptar",
                    })
                }
            });
        }
    })
});