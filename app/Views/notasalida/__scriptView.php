<script>
$('#IdSede').change(function() {
    var id_sede = $('#IdSede').val();
    var id_tipodocumento = 12;
    if (id_sede == '') {
        $('#span-serie').text('--');
        $('[name="Numero"]').val('');
    } else {
        $.ajax({
            type: "GET",
            url: "NotaSalida/obtenerCorrelativo/" + id_sede + "/" + id_tipodocumento,
            dataType: "JSON",
            success: function(data) {
                if (data == 'crearserie') {
                    $('#span-serie').text('--');
                    $('[name="Numero"]').val('');
                    alertify.confirm('Mensaje del Sistema', 'No hay una Serie para esta Sede, creemos una para Nota de Salida, haga Click en Ok', function() {
                       $('#modal_serie').modal('show');
                    }, function() {});
                } else {
                    $('[name="Numero"]').val(data['newcorrelativo']);
                    $('[name="Serie"]').val(data['serie']);
                    $('#span-serie').text(data['serie']);
                }
            },
            error: function(jqXHR) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Al parecer hubo un error en el Servidor');
            }
        });
    }
});

$("#btn-cliente").click(function() {
    var num_documento = $('#Cliente').val();
    if (num_documento.length == 8) {
        if (navigator.onLine) {
            link = "Persona/consultarDni/" + num_documento;
            buscardocumento(link, tipo_documento);
        } else {
            alertify.alert(
                "Usted no se encuentra conectado a Internet, alternativamente puede escribir el nombre manualmente"
            );
        }
    } else if (num_documento.length == 11) {
        if (navigator.onLine) {
            link = "Persona/consultarDni/" + num_documento;
            buscardocumento(link, tipo_documento);
        } else {
            alertify.alert(
                "Usted no se encuentra conectado a Internet, alternativamente puede escribir el nombre manualmente"
            );
        }
    } else {
        alertify.alert("");
    }
});
</script>