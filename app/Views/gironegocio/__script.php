<script type="text/javascript">
    $(document).ready(function() {
        datatable_negocio = $('#datatable_negocio').DataTable({
            "ajax": {
                "url": "GiroNegocio/obtenerGirosNegocio",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdGiroNegocio"},
                {"data": "NombreGiroNegocio"},
                {"data": "FechaRegistro"},
                {"data": "UsuarioRegistro"},
                {
                    data: "IndicadorEstado",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "IndicadorEstado",
                    render: function(data) {return estado_valor(data, 'btn-estado');}
                }
            ]
        });
    
    });

        $("#envio_search").on("submit", function(e) {
            e.preventDefault();
            var IdGiroNegocio = $('#IdGiroNegocio').val();
            if (IdGiroNegocio == "") {
                var link = "GiroNegocio/registrarGiroNegocio";
            } else {
                var link = "GiroNegocio/modificarGiroNegocio";
            }
            addEditRegistro('envio_search',link,luegoInsertarEditarGirpNegocio);
        });

        function luegoInsertarEditarGirpNegocio(){
            $('#modal_negocio').modal('hide');
            $('#envio_search').trigger('reset');
            datatable_negocio.ajax.reload(null, false);
        }

        /*cargar datos*/
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'GiroNegocio/editarGiroNegocio/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('.div-user').css('display','block');
                    $('#IdGiroNegocio').val(data.IdGiroNegocio);
                    $('#NombreGiroNegocio').val(data.NombreGiroNegocio);
                    $("#ShowUsuarioModificacion").text('Usuario_Modificacion: '+data.UsuarioModificacion);
                    $("#ShowFechaModificacion").text('Fecha_Modificacion: '+data.FechaModificacion);
                    $('#modal_negocio').modal('show');
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
            var indicador_estado = 0;
            alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        //restaurar
        $('body').on('click', '.item_restaurar', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var indicador_estado = 1;
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "GiroNegocio/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_negocio.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

</script>