<script type="text/javascript">
    $(document).ready(function() {
        datatable();
        
        function datatable(){
           var fecha = $('#FechaInventarioParametro').val();
           var idsede = $('#IdSedeParametro').val();
           if(fecha==''){
               fecha=0;
           }
           $("#datatable_resumen").dataTable().fnDestroy();
            datatable_resumen= $('#datatable_resumen').DataTable({
                "ajax": {
                    "url": "ResumenInventario/obtenerResumenInventario/"+idsede+"/"+fecha,
                    "method": 'GET',
                    "dataType": 'json',
                    "dataSrc": ""
                },
                "columns": [
                    {"data": "IdResumenInventario"},
                    {"data": "NombreSede"},
                    {"data": "NombreTipoInventario"},
                    {"data": "FechaInventario"},
                    {
                        data: "EstadoResumenInventario",
                        render: function(data) {return estado_valor(data, 'span-estado');}
                    },
                    {
                        data: "EstadoResumenInventario",
                        render: function(data) {return estado_valor(data, 'btn-resumen');}
                    }
                ],
                "order":  [[ 3, 'desc' ],[ 0, 'desc' ]]
            });
        }

        $("#envio_resumen").on("submit", function(e) {
            e.preventDefault();
            var link = "ResumenInventario/registrarResumenInventario";            
            addEditRegistro('envio_resumen',link,luegoInsertarResumen);
        });
        
        function luegoInsertarResumen(){
            $('#modal_resumen').modal('hide');
            $('#envio_resumen').trigger('reset');
            datatable_resumen.ajax.reload(null, false);
        }

        $("#envio_edit").on("submit", function(e) {
            e.preventDefault();
            var link = "ResumenInventario/modificarResumenInventario";            
            addEditRegistro('envio_edit',link,luegoEditarResumen);
        });
        
        function luegoEditarResumen(){
            $('#modal_edit').modal('hide');
            $('#datatable_resumen').DataTable().ajax.reload(null, false);
        }

        //eliminar
        $('body').on('click', '.item_delete', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $('#deleteIdResumenInventario').val(id);
            $('#deleteIdInventario').val('');
            $('#DeleteMotivo').val('');
            $('#modal_delete').modal('show');
        });

        $("#envio_delete").on("submit", function(e) {
            e.preventDefault();
            id_resumen= $('#deleteIdResumenInventario').val();
            motivo=$('#DeleteMotivo').val();
            if(id_resumen!=''){
                var link = "ResumenInventario/modificarIndicadorEstado/" + id_resumen + "/" + motivo; 
            }else{
                id_inventario= $('#deleteIdInventario').val();
                var id_resumen = localStorage.getItem('id_resumen');
                var link = "ResumenInventario/modificarIndicadorEstadoInventario/" + id_inventario + "/" + id_resumen + "/" + motivo; 
            }              
            addEditRegistro('envio_delete',link,luegoEliminar);
        });

        function luegoEliminar(){
            $('#modal_delete').modal('hide');
            $('#datatable_resumen').DataTable().ajax.reload(null, false);
            $('#datatable_inventario').DataTable().ajax.reload(null, false);
        }

        //Inventario Producto
        $('body').on('click', '.item_show', function() {
            var fila = $(this).closest("tr");
            var id_resumen = parseInt(fila.find('td:eq(0)').text());
            var nombre_sede = fila.find('td:eq(1)').text();
            var fecha_inventario = fila.find('td:eq(3)').text();
            localStorage.setItem('id_resumen', id_resumen);
            localStorage.setItem('nombre_sede', nombre_sede);
           
            $('#txt_resumen').text(nombre_sede+' - '+fecha_inventario);
            $("#datatable_inventario").dataTable().fnDestroy();
            datatable_inventario = $('#datatable_inventario').DataTable({
            "ajax": {
                "url": "ResumenInventario/mostrarProductoResumen/" + id_resumen,
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdInventario"},
                {"data": "NombreProducto"},
                {"data": null,
                    render: function(data, type, row, meta)
                    {   
                        return '<a href="#" class="item_historial" title="Ver Historial del Producto">'+ row.NombreUnidadMedida+'</a>';
                    },
                },
                {"data": "Stock"},
                {"data": "CantidadConteo"},
                {"data": "Diferencia"},
                {"data": "CostoUnitario"},
                {"data": "CostoTotal"},
                {"data": "CondicionInventario"},
                {
                    data: "EstadoInventario",
                    render: function(data) {
                        return estado_valor(data, 'span-estado');
                    }
                },
                {
                    data: "EstadoInventario",
                    render: function(data) {
                        return estado_valor(data, 'btn-inventario');
                    }
                }
            ]
            });

            $('#tabla_resumen').hide();
            $('.historial').hide();
            $('.inventario').show();

    });   
    
    $( "#volver").click(function() {
        $('#tabla_resumen').show();
        $('.historial').hide();
        $('.inventario').hide();
    });

    $( "#volver_historial").click(function() {
        $('.historial').hide();
        $('.inventario').show();
    });

    //item_edit 

        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'ResumenInventario/editarResumenInventario/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#ShowIdResumenInventario').val(id);
                    $('#ShowFechaInventario').val(data.FechaInventario);
                    $('#ShowObservacion').val(data.Observacion);
                    $("#ShowUsuarioRegistro").text(data.UsuarioRegistro);
                    $("#ShowFechaRegistro").text(data.FechaRegistro);
                    $("#ShowUsuarioModificacion").text(data.UsuarioModificacion);
                    $("#ShowFechaModificacion").text(data.FechaModificacion);
                    $("#ShowUsuarioEliminacion").text(data.UsuarioEliminacion);
                    $("#ShowFechaEliminacion").text(data.FechaEliminacion);
                    $('#modal_edit').modal('show');

                },
                error: function() {
                    alert("error peticion ajax");
                }
            });
        });
        
        $('#FechaInventarioParametro').on('change', function() {
             datatable();
        });

        $('#IdSedeParametro').on('change', function() {
             datatable();
        });

    });
</script>