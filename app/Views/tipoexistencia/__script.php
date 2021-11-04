<script type="text/javascript">
$(document).ready(function() {
     datatable_tipoexistencia = $('#datatable_tipoexistencia').DataTable({
            "ajax": {
                "url": "TipoExistencia/obtenerTiposExistencia",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdTipoExistencia"},
                {"data": "CodigoTipoExistencia"},
                {"data": "NombreTipoExistencia"},
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
        var IdTipoxistencia = $('#IdTipoExistencia').val();
        if(IdTipoExistencia==""){
            var link = "TipoExistencia/registrarTipoExistencia";
        }else{
            var link = "TipoExistencia/modificarTipoExistencia";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarTipoExistencia);
    });

    function luegoInsertarEditarTipoExistencia(){
        $('#envio_search').trigger('reset');
        $('#modal_tipoexistencia').modal('hide');
        datatable_persona.ajax.reload(null, false);
    }


    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'TipoExistencia/editarTipoExistencia/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#IdTipoExistencia').val(data.IdTipoExistencia);
                $('#CodigoTipoExistencia').val(data.CodigoTipoExistencia);
                $('#NombreTipoExistencia').val(data.NombreTipoExistencia);
                $('#modal_tipoexistencia').modal('show');
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
                url: "TipoExistencia/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_tipoexistencia.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('TipoExistencia/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('TipoExistencia/generarReporte/'+tipo);
        });

});

</script>