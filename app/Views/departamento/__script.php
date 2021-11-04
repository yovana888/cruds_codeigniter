<script type="text/javascript">
$(document).ready(function() {
   
    datatable_departamento = $('#datatable_departamento').DataTable({
            "ajax": {
                "url": "Departamento/obtenerDepartamento",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdDepartamento"},
                {"data": "NombreDepartamento"},
                {"data": "CodigoUbigeoDepartamento"},
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
                var IdDepartamento = $('#IdDepartamento').val();
                if(IdDepartamento==""){
                    var link = "departamento/registrarDepartamento"
                }else{
                    var link = "departamento/modificarDepartamento";
                }
                addEditRegistro('envio_search',link,luegoInsertarEditarDepartamento);
    });

    function  luegoInsertarEditarDepartamento(){
        $('#envio_search').trigger('reset');
        $('#modal_departamento').modal('hide');
        datatable_departamento.ajax.reload(null, false);
    }

    /*La funcion para hacer reset del formulario esta en el mismo boton*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'Departamento/editarDepartamento/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                const datos = JSON.parse(JSON.stringify(data.data));
                $('#IdDepartamento').val(datos.IdDepartamento);
                $('#NombreDepartamento').val(datos.NombreDepartamento);
                $('#CodigoUbigeoDepartamento').val(datos.CodigoUbigeoDepartamento);
                $('#modal_departamento').modal('show');
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
                url: "Departamento/modificarIndicadorEstado/" +id+ "/" +indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_departamento.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('Departamento/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('Departamento/generarReporte/'+tipo);
        });

});

</script>