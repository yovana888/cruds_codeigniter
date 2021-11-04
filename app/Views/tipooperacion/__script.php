<script type="text/javascript">
$(document).ready(function() {
   
        datatable_tipooperacion = $('#datatable_tipooperacion').DataTable({
            "ajax": {
                "url": "TipoOperacion/obtenerTiposOperacion",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdTipoOperacion"},
                {"data": "CodigoTipoOperacion"},
                {"data": "CodigoSUNAT"},
                {"data": "NombreTipoOperacion"},
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
        var f = $(this);
        var data = new FormData(document.getElementById("envio_search"));
        data.append("dato", "valor");
        var IdTipoOperacion = $('#IdTipoOperacion').val();
        if(IdTipoOperacion==""){
            var link = "TipoOperacion/registrarTipoOperacion";
        }else{
            var link = "TipoOperacion/modificarTipoOperacion";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarTipoOperacion);
    });

    function luegoInsertarEditarTipoOperacion(){
        $('#envio_search').trigger('reset');
        $('#modal_tipooperacion').modal('hide');
        datatable_tipooperacion.ajax.reload(null, false);
    }

    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'TipoOperacion/editarTipoOperacion/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#IdTipoOperacion').val(data.IdTipoOperacion);
                $('#CodigoTipoOperacion').val(data.CodigoTipoOperacion);
                $("#CodigoSUNAT").val(data.CodigoSUNAT);
                $("#NombreTipoOperacion").val(data.NombreTipoOperacion);
                $('#modal_tipooperacion').modal('show');
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
                url: "TipoOperacion/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_tipooperacion.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('TipoOperacion/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('TipoOperacion/generarReporte/'+tipo);
        });


});

</script>