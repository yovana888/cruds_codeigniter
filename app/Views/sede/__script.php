<script type="text/javascript">
    $(document).ready(function() {
        datatable_sede= $('#datatable_sede').DataTable({
            "ajax": {
                "url": "Sede/obtenerSedes",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdSede"},
                {"data": "RazonSocial"},
                {"data": "NombreSede"},
                {"data": "CodigoSede"},
                {"data": "Direccion"},
                {
                    data: "EstadoSede",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "EstadoSede",
                    render: function(data) {return estado_valor(data, 'btn-estado');}
                }
            ]
        });

        $("#envio_search").on("submit", function(e) {
            e.preventDefault();
            var IdSede = $('#IdSede').val();
            if (IdSede == "") {
                var link = "Sede/registrarSede";
            } else {
                var link = "Sede/modificarSede";
            }
            addEditRegistro('envio_search',link,luegoInsertarEditarSede);
        });

        function luegoInsertarEditarSede(){
            $('#modal_sede').modal('hide');
            $('#envio_search').trigger('reset');
            datatable_sede.ajax.reload(null, false);
        }

        /*cargar datos*/
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Sede/editarSede/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#IdSede').val(data.IdSede);
                    $('#NombreSede').val(data.NombreSede);
                    $('#CodigoSede').val(data.CodigoSede);
                    $('#Direccion').val(data.Direccion);
                    $('#modal_sede').modal('show');
                },
                error: function() {
                    alert("error peticion ajax");
                }
            });
        });

        //eliminar
        $('body').on('click', '.item_delete', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var indicador_estado = 'I';
            alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ' +id+ '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        //restaurar
        $('body').on('click', '.item_restaurar', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var indicador_estado = 'A';
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro '+id+ '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "Sede/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_sede.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        //Reportes
        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('Sede/generarReporte/'+tipo); 
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('Sede/generarReporte/'+tipo);
        });

    });
</script>