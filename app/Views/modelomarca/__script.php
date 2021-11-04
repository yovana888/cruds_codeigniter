<script type="text/javascript">
    $(document).ready(function() {
        datatable_modelomarca= $('#datatable_modelomarca').DataTable({
            "ajax": {
                "url": "ModeloMarca/obtenerModelosMarca",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdModeloMarca"},
                {"data": "NombreMarca"},
                {"data": "NombreModeloMarca"},

                {
                    data: "EstadoModeloMarca",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "EstadoModeloMarca",
                    render: function(data) {return estado_valor(data, 'btn-estado');}
                }
            ],
            "order":  [[ 1, 'asc' ],[ 0, 'asc' ]]
        });

        $("#envio_search").on("submit", function(e) {
            e.preventDefault();
            var IdModeloMarca = $('#IdModeloMarca').val();
            if (IdModeloMarca == "") {
                var link = "ModeloMarca/registrarModeloMarca";
            } else {
                var link = "ModeloMarca/modificarModeloMarca";
            }
            addEditRegistro('envio_search',link,luegoInsertarEditarModeloMarca);
        });

        function luegoInsertarEditarModeloMarca(){
            $('#modal_modelomarca').modal('hide');
            $('#envio_search').trigger('reset');
            datatable_modelomarca.ajax.reload(null, false);
        }

        /*cargar datos*/
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'ModeloMarca/editarModeloMarca/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#IdMarca').val(data.IdMarca);
                    $('#IdModeloMarca').val(data.IdModeloMarca);
                    $('#NombreModeloMarca').val(data.NombreModeloMarca);
                    $('#modal_modelomarca').modal('show');
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
            var indicador_estado = 1;
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro '+id+ '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "ModeloMarca/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_modelomarca.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        //Reportes
        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('ModeloMarca/generarReporte/'+tipo); 
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('ModeloMarca/generarReporte/'+tipo);
        });

    });
</script>