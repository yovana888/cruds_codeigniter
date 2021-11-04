<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/JsBarcode.all.min.js"></script>
<script src="assets/js/plugin/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    datatable();
    function datatable(){
            var id_sede= $('#IdSedeParametro').val();
            $("#datatable_producto").dataTable().fnDestroy();
            datatable_producto = $('#datatable_producto').DataTable({
            "ajax": {
                "url": "Producto/obtenerProductos/"+id_sede,
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdProducto"},
                {"data": "CodigoProducto"},
                {"data": "NombreProducto"},
                {"data": "NombreFamiliaProducto"},
                {"data": "NombreSubFamiliaProducto"},
                {"data": "NombreMarca"},
                {"data": "NombreModeloMarca"},
                {
                    data: "EstadoProducto",
                    render: function(data) {
                        return estado_valor(data, 'span-estado');
                    }
                },
                {
                    data: "EstadoProducto",
                    render: function(data) {
                        return estado_valor(data, 'btn-producto');
                    }
                }
            ]
        });
    }

   $('.seccion_historial').hide();
   $('.seccion_inventario').hide();
   
   $('#IdSedeParametro').change(function() { 
        datatable();
    });

    //mostrar detalles en el modal __show
    $('body').on('click', '.item_show', function() {
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        console.log('aqui' + id);
        $.ajax({
            url: 'Producto/mostrarDetalles/' + id,
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $("#show_NombreComercialProducto").text(data[0].NombreComercialProducto);
                $("#show_CodigoComercialProducto").text(data[0].CodigoComercialProducto);
                $("#show_NombreFabricante").text(data[0].NombreFabricante);
                $("#show_NombreLineaProducto").text(data[0].NombreLineaProducto);
                $("#show_NombreCategoriaProducto").text(data[0].NombreCategoriaProducto);
                $("#show_NombreTipoProducto").text(data[0].NombreTipoProducto);
                $("#show_NombreTipoPrecio").text(data[0].NombreTipoPrecio);
                $("#show_NombreTipoActivo").text(data[0].NombreTipoActivo);
                $("#show_NombreTipoExistencia").text(data[0].NombreTipoExistencia);
                $("#show_NombreTipoServicio").text(data[0].NombreTipoServicio);
                $("#show_OtroDato").text(data[0].OtroDato);

                $("#show_UsuarioRegistro").text(data[0].UsuarioRegistro);
                $("#show_FechaRegistro").text(data[0].FechaRegistro);
                $("#show_MaquinaRegistro").text(data[0].MaquinaRegistro);
                $("#show_UsuarioModificacion").text(data[0].UsuarioModificacion);
                $("#show_FechaModificacion").text(data[0].FechaModificacion);
                $("#show_MaquinaModificacion").text(data[0].MaquinaModificacion);
                $("#show_UsuarioEliminacion").text(data[0].UsuarioEliminacion);
                $("#show_FechaEliminacion").text(data[0].FechaEliminacion);
                $("#show_MaquinaEliminacion").text(data[0].MaquinaEliminacion);
                $('#modal_detalle').modal('show');
            },
            error: function() {
                alert("error peticion ajax");
            }
        });
    });

    //Registrar Producto
    $("#envio_search").on("submit", function(e) {
        e.preventDefault();
        var IdProducto = $('#IdProducto').val();

        if (IdProducto == "") {
            var link = "Producto/registrarProducto"
        } else {
            var link = "Producto/modificarProducto";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarProducto);
       
    }); //fin insertar y editar nuevo producto

    function luegoInsertarEditarProducto(){
        $('#modal_producto').modal('hide');
        $('#envio_search').trigger('reset');
        $('#datatable_producto').DataTable().ajax.reload(null, false);
    }


    //eliminar
    $('body').on('click', '.item_delete', function() {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        var estado_producto = 0;
        alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ' + id +'?',

            function() {
                modificarIndicadorEstado(id, estado_producto);
            },
            function() {});
    });

    //restaurar
    $('body').on('click', '.item_restaurar', function() {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        var estado_producto = 1;
        alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

            function() {
                modificarIndicadorEstado(id, estado_producto);
            },
            function() {});
    });

    function modificarIndicadorEstado(id, estado_producto) {
        $.ajax({
            type: "POST",
            url: "Producto/modificarIndicadorEstado/" + id + "/" + estado_producto,
            dataType: "JSON",
            success: function(data) {
                $('#datatable_producto').DataTable().ajax.reload(null, false);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('El Estado del Registro se Modifico Correctamente');
            }
        });
    }

    //Generar Reporte Producto, Modal _reporte
    $("#procesar").click(function() {
        //if si es cheked ruta email, else reporte normal
        reporte = $('#IdReporte').val();
        tipo = $('input:radio[name=rb-reporte]:checked').val();
        if( $('#CheckEmail').prop('checked') ) {
            var dataemail = new FormData(document.getElementById('procesar_reporte'));
            dataemail.append("Mensaje", $('#mensaje').summernote('code'));
            $.ajax({
            type: 'POST',
            url: "Producto/enviarReporte/" + tipo + "/" + reporte,
            data:dataemail,
            processData: false,
            contentType: false,  
            async: false,
                success: function(data) {
                    console.log(data);
                    if(data == "ok"){
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('Se envio el reporte con Exito');
                    }else{
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(data);
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
           });
        }else{
            window.open('Producto/generarReporte/' + tipo + '/' + reporte);
        }
    });
    
    //inicializar summernote para email
    $('.summernote').summernote({
        height: 120,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null             // set maximum height of editor             
    });

    $('#CheckEmail').change(function() { 
        if(this.checked) {
            $('.ocultar').show();
            $("#procesar").prop("disabled", true);
            //remover el required
        }else{
            $('.ocultar').hide();   
            $("#procesar").removeAttr('disabled');
            //agregar required
        }  
    });

     // Validar Para email
      
        $('#EmailReceptor').change(function() {  reset('EmailReceptor','receptor'); });
        $('#EmailReceptor').keyup(function() {  reset('EmailReceptor','receptor'); });
        $('#EmailReceptor').blur(function() { validarEmail('EmailReceptor','receptor','procesar'); });

    //Inventario Producto
    $('body').on('click', '.item_inventario', function() {
            fila = $(this).closest("tr");
            id_producto = parseInt(fila.find('td:eq(0)').text());
            nombre_producto = fila.find('td:eq(2)').text();
            localStorage.setItem('id_producto_temporal', id_producto);
            localStorage.setItem('nombre_producto_temporal', nombre_producto);
            $('#txt_producto').text(nombre_producto+' '+'- Inventario');
            var id_sede= $('#IdSedeParametro').val();
            $("#datatable_inventario").dataTable().fnDestroy();
            datatable_inventario = $('#datatable_inventario').DataTable({
            "ajax": {
                "url": "Inventario/mostrarInventario/" +  id_producto +"/" +id_sede ,
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdInventario"},
                {"data": "NombreUnidadMedida"},
                {"data": "Stock"},
                {"data": "CantidadConteo"},
                {"data": "Diferencia"},
                {"data": "CostoUnitario"},
                {"data": "CostoTotal"},
                {"data": "NombreSede"},
                {"data": "FechaInventario"},
                {"data": "CondicionInventario"},
                {
                    data: "EstadoInventario",
                    render: function(data) {
                        return estado_valor(data, 'btn-inventario');
                    }
                }
            ]
            });

            $('.seccion_producto').hide();
            $('.seccion_inventario').show();

    });     

    
    $( "#volver").click(function() {
        $('.seccion_producto').show();
        $('.seccion_inventario').hide();
    });    

});
</script>