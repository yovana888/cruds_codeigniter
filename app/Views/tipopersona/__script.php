<script type="text/javascript">
    $(document).ready(function() {
        datatable_persona = $('#datatable_persona').DataTable({
            "ajax": {
                "url": "TipoPersona/obtenerTiposPersona",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdTipoPersona"},
                {"data": "NombreTipoPersona"},
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

        $("#envio_search").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var data = new FormData(document.getElementById("envio_search"));
        data.append("dato", "valor");
        var IdTipoPersona = $('#IdTipoPersona').val();
        if(IdTipoPersona==""){
            var link = "TipoPersona/registrarTipoPersona";
        }else{
            var link = "TipoPersona/modificarTipoPersona";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarTipoPersona);
    });

    function luegoInsertarEditarTipoPersona(){
        $('#envio_search').trigger('reset');
        $('#modal_persona').modal('hide');
        datatable_persona.ajax.reload(null, false);
    }

    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'TipoPersona/editarTipoPersona/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#IdTipoPersona').val(data.IdTipoPersona);
                $('#NombreTipoPersona').val(data.NombreTipoPersona);
                $('#modal_persona').modal('show');
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
                url: "TipoPersona/modificarIndicadorEstado/" + id + "/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_persona.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('TipoPersona/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('TipoPersona/generarReporte/'+tipo);
        });
    });
</script>