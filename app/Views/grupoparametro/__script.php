<script type="text/javascript">
$(document).ready(function() {
    
    datatable_grupoparametro = $('#datatable_grupoparametro').DataTable({  
        "ajax":{            
            "url": "GrupoParametro/obtenerGrupoParametro", 
            "method": 'GET', 
            "dataType": 'json',
            "dataSrc":""
        },
        "columns":[
            {"data": "IdGrupoParametro"},
            {"data": "NombreGrupoParametro"},             
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
        var IdGrupoParametro = $('#IdGrupoParametro').val();
        if(IdGrupoParametro==""){
            var link = "grupoparametro/registrarGrupoParametro"
        }else{
            var link = "grupoparametro/modificarGrupoParametro";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarGrupoParametro);
    });

    function luegoInsertarEditarGrupoParametro(){
        $('#envio_search').trigger('reset');
        $('#modal_grupoparametro').modal('hide');
        datatable_grupoparametro.ajax.reload(null, false);
    }

    /*La funcion para hacer reset del formulario esta en el mismo boton*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");           
        const id = parseInt(fila.find('td:eq(0)').text());
        console.log(id);
        $.ajax({
            url: 'GrupoParametro/editarGrupoParametro/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                const datos = JSON.parse(JSON.stringify(data.data));
                $('#IdGrupoParametro').val(datos.IdGrupoParametro);
                $('#NombreGrupoParametro').val(datos.NombreGrupoParametro);                
                $('#modal_grupoparametro').modal('show');
            },
            error: function () {
                alertify.error("Error al solicitar los datos");
            }
        });
    });

    $('body').on('click', '.item_delete', function() {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        var indicador_estado = '0';
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
        var indicador_estado = '1';
        alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

            function() {
                modificarIndicadorEstado(id, indicador_estado);
            },
            function() {});
    });

    function modificarIndicadorEstado(id, indicador_estado) {
        $.ajax({
            type: "POST",
            url: "GrupoParametro/modificarIndicadorEstado/" +id+"/" + indicador_estado,
            dataType: "JSON",
            success: function(data) {
                datatable_grupoparametro.ajax.reload(null, false);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('El Estado del Registro se Modifico Correctamente');
            }
        });
    }    

});

</script>