function addEditRegistro(form, link, metodo) {
    var data = new FormData(document.getElementById(form));
    data.append("dato", "valor");
    $.ajax({
        type: "POST",
        url: link,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        error: function() {
            alertify.set('notifier', 'position', 'top-right');
            alertify.error("Error en el envio de datos en el Servidor");
        },
        success: function(data) {
            if (!isNaN(data) || data == "true") {

                $.notify({
                    icon: 'flaticon-success',
                    title: 'Mensaje del Sistema',
                    message: 'Se envio con Exito'
                }, {
                    type: 'success',
                    delay: 3000,
                });

                $('#id_temporal').val(data);
                metodo();
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(data);
                $('#id_temporal').val('-');
            }

        }
    });

} //fin de la funcion de addRegistro