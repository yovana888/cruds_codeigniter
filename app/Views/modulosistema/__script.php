<script type="text/javascript">

$(document).ready(function() {
    
    datatable_modulosistema = $('#datatable_modulosistema').DataTable({  
    "ajax":{            
        "url": "ModuloSistema/obtenerModuloSistema", 
        "method": 'GET', //usamos el metodo POST
        "dataType": 'json',
        "dataSrc":""
    },
    "columns":[
        {"data": "IdModuloSistema"},
        {"data": "NombreModuloSistema"},
        {"data": "UrlModulo"},
        {"data": "AtajoModulo"},
        //{"defaultContent": "<input type='checkbox'  class='checkid form-check-input'  value='' >","data": "AtajoModulo"},
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
        var IdDepartamento = $('#IdModuloSistema').val();
        if(IdDepartamento==""){
            var link = "modulosistema/registrarModuloSistema"
        }else{
            var link = "modulosistema/modificarModuloSistema";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarModuloSistema);
    });

    function luegoInsertarEditarModuloSistema(){
        $('#envio_search').trigger('reset');
        $('#modal_modulosistema').modal('hide');
        datatable_modulosistema.ajax.reload(null, false);
    }
    /*La funcion para hacer reset del formulario esta en el mismo boton*/
    $('body').on('click', '.item_edit', function () {
        //const id = $(this).attr('data-id');
        fila = $(this).closest("tr");	        
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'ModuloSistema/editarModuloSistema/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                const datos = JSON.parse(JSON.stringify(data.data));
                $('#IdModuloSistema').val(datos.IdModuloSistema);
                $('#NombreModuloSistema').val(datos.NombreModuloSistema);
                $('#IdModulo').val(datos.IdModulo);
                $('#UrlModulo').val(datos.UrlModulo);
                $('#ItemModulo').val(datos.ItemModulo);
                $('#NameModulo').val(datos.NameModulo);
                $('#AtajoModulo').val(datos.AtajoModulo);
                $('#modal_modulosistema').modal('show');
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
            url: "ModuloSistema/modificarIndicadorEstado/" +id+"/" + indicador_estado,
            dataType: "JSON",
            success: function(data) {
                datatable_modulosistema.ajax.reload(null, false);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('El Estado del Registro se Modifico Correctamente');
            }
        });
    }

    $( "#pdf").click(function() {
        var tipo='pdf';
        window.open('ModuloSistema/generarReporte/'+tipo); //generar
    });

    $( "#xlsx").click(function() {
        var tipo='xlsx';
        window.open('ModuloSistema/generarReporte/'+tipo);
    });    
   

});

</script>