<script type="text/javascript">

    $(document).ready(function() {
        datatable_provincia = $('#datatable_provincia').DataTable({
            "ajax": {
                "url": "Provincia/obtenerProvincias",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdProvincia"},
                {"data": "CodigoUbigeoProvincia"},
                {"data": "NombreProvincia"},
                {"data": "NombreDepartamento"},
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
        var IdProvincia = $('#IdProvincia').val();
        if(IdProvincia==""){
            var link = "provincia/registrarProvincia";
        }else{
            var link = "provincia/modificarProvincia";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarProvincia);
        
    });

    function luegoInsertarEditarProvincia(){
        $('#envio_search').trigger('reset');
        $('#modal_provincia').modal('hide');
        $('#IdDepartamento').select('refresh');
        datatable_provincia.ajax.reload(null, false);
    }

    $('select#IdDepartamento').on('change', function() {
       id= $('#IdDepartamento').val();
       $.ajax({
            type: "GET",
            url: "Provincia/obtenerSiguienteCodigoUbigeo/"+id,
            dataType: "JSON",
            success: function(data) {
                $('[name="CodigoUbigeoProvincia"]').val(data);
            },
            error: function(jqXHR) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Al parecer hubo un error');
            }
        });
    });

    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'Provincia/editarProvincia/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#IdProvincia').val(data.IdProvincia);
                $('#NombreProvincia').val(data.NombreProvincia);
                $('#CodigoUbigeoProvincia').val(data.CodigoUbigeoProvincia);
                $("#IdDepartamento").val(data.IdDepartamento);
                $('#modal_provincia').modal('show');
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
            var indicador_estado ='I';
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
            var indicador_estado ='A';
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "Provincia/modificarIndicadorEstado/" +id+ "/" +indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_provincia.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('Provincia/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('Provincia/generarReporte/'+tipo);
        });


});

</script>