<script type="text/javascript">
$(document).ready(function() {
       datatable_unidadmedida = $('#datatable_unidadmedida').DataTable({
            "ajax": {
                "url": "UnidadMedida/obtenerUnidadesMedida",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdUnidadMedida"},
                {"data": "CodigoUnidadMedidaSunat"},
                {"data": "NombreUnidadMedida"},
                {"data": "AbreviaturaUnidadMedida"},
                {"data": "NombreUnidadComercial"},
                {"data": "AbreviaturaComercial"},
                {
                    data: "IndicadorEstado",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "IndicadorEstado",
                    render: function(data) {return estado_valor(data, 'btn-estado');}
                }
            ],
            "order":  [[ 6, 'asc' ],[ 0, 'asc' ]]
        });

    $("#envio_search").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var data = new FormData(document.getElementById("envio_search"));
        data.append("dato", "valor");
        var IdUnidadMedida = $('#IdUnidadMedida').val();
        if(IdUnidadMedida==""){
            var link = "UnidadMedida/registrarUnidadMedida";
        }else{
            var link = "UnidadMedida/modificarUnidadMedida";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarUnidad);
    });

    function luegoInsertarEditarUnidad(){
        $('#envio_search').trigger('reset');
        $('#modal_unidadmedida').modal('hide');
        datatable_unidadmedida.ajax.reload(null, false);
    }

    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'UnidadMedida/editarUnidadMedida/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#IdUnidadMedida').val(data.IdUnidadMedida);
                $('#CodigoUnidadMedidaSunat').val(data.CodigoUnidadMedidaSunat);
                $('#NombreUnidadMedida').val(data.NombreUnidadMedida);
                $("#AbreviaturaUnidadMedida").val(data.AbreviaturaUnidadMedida);
                $("#NombreUnidadComercial").val(data.NombreUnidadComercial);
                $("#AbreviaturaComercial").val(data.AbreviaturaComercial);
                $('#modal_unidadmedida').modal('show');
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
            alertify.confirm('Ventana Agregar', 'Esta seguro de agregar la Unidad de Medida Nº' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "UnidadMedida/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_unidadmedida.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('UnidadMedida/generarReporte/'+tipo); 
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('UnidadMedida/generarReporte/'+tipo);
        });

});

</script>