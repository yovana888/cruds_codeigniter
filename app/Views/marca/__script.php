<script type="text/javascript">
    $(document).ready(function() {
        datatable_marca= $('#datatable_marca').DataTable({
            "ajax": {
                "url": "Marca/obtenerMarcas",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdMarca"},
                {"data": "NombreMarca"},
                {"data": "InicialesMarcaNombreProducto"},
                {"data": "InicialesMarcaCodigoProducto"},
                {
                    data: "EstadoMarca",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "EstadoMarca",
                    render: function(data) {return estado_valor(data, 'btn-estado');}
                }
            ]
        });

        
         //Igualar nombremarca a iniciales para nombre producto 
         $('#Check1').change(function() { 
            if(this.checked) {
            nombre_marca=$('#NombreMarca').val();
            $('#InicialesMarcaNombreProducto').val(nombre_marca);
            }   
        });

        
        //Extraer 4 primeros caracteres para el inicailes codigo 
        $('#Check2').change(function() { 
            if(this.checked) {
            nombre_marca=$('#NombreMarca').val();
            iniciales=nombre_marca.substring(0,4);
            mayusculas=iniciales.toUpperCase();
            $('#InicialesMarcaCodigoProducto').val(mayusculas);
            }   
        });


        $("#envio_search").on("submit", function(e) {
            e.preventDefault();
            var IdMarca = $('#IdMarca').val();
            if (IdMarca == "") {
                var link = "Marca/registrarMarca";
            } else {
                var link = "Marca/modificarMarca";
            }
            addEditRegistro('envio_search',link,luegoInsertarEditarMarca);
        });
        
        function luegoInsertarEditarMarca(){
            $('#modal_marca').modal('hide');
            $('#envio_search').trigger('reset');
            datatable_marca.ajax.reload(null, false);
        }


        /*cargar datos*/
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Marca/editarMarca/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#IdMarca').val(data.IdMarca);
                    $('#NombreMarca').val(data.NombreMarca);
                    $('#InicialesMarcaNombreProducto').val(data.InicialesMarcaNombreProducto);
                    $('#InicialesMarcaCodigoProducto').val(data.InicialesMarcaCodigoProducto);
                    $('#modal_marca').modal('show');
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
                url: "Marca/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_marca.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        //Reportes
        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('Marca/generarReporte/'+tipo); 
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('Marca/generarReporte/'+tipo);
        });

    });
</script>