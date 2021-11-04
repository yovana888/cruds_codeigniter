<script type="text/javascript">
$(document).ready(function() {
     datatable_rol = $('#datatable_rol').DataTable({
            "ajax": {
                "url": "Rol/obtenerRoles",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdRol"},
                {"data": "NombreRol"},
                {
                    data: "VerTodasVentas",
                    render: function(data) {return estado_valor(data, 'span-checked');}
                },
                {
                    data: "VerComboVentas",
                    render: function(data) {return estado_valor(data, 'span-checked');}
                },
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

    $("#envio_search").on("submit", function(e){
        e.preventDefault();
        var IdRol = $('#IdRol').val();
        if(IdRol==""){
            var link = "Rol/registrarRol";
        }else{
            var link = "Rol/modificarRol";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarRol);
    });

    function luegoInsertarEditarRol(){
        $('#envio_search').trigger('reset');
        $('#modal_rol').modal('hide');
        datatable_rol.ajax.reload(null, false);
    }


    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'Rol/editarRol/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#IdRol').val(data.IdRol);
                $('#NombreRol').val(data.NombreRol);
                $('#CheckVentas').val(data.VerTodasVentas);
                $('#CheckCombo').val(data.VerComboVentas);

                    if (data.VerTodasVentas == '1') {
                        $('#CheckVentas').prop('checked', true);
                    } else {
                        $('#CheckVentas').prop('checked', false);
                    }

                    if (data.VerComboVentas == '1') {
                        $('#CheckCombo').prop('checked', true);
                    } else {
                        $('#CheckCombo').prop('checked', false);
                    }
                $('#modal_rol').modal('show');
            },
            error: function () {
                alert("error peticion ajax");
            }
        });
    });

    //eliminar
        $('body').on('click', '.item_delete', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var indicador_estado = 'I';
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
            var indicador_estado = 'A';
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "Rol/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_rol.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('Rol/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('TipoExistencia/generarReporte/'+tipo);
        });

        function checkValor(id,checked)
        {
            if(checked == true) {
            document.getElementById(id).value = "1";
            } else {
            document.getElementById(id).value = "0";
            }
        }

});

</script>