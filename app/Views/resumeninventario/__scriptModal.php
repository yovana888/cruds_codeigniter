<script type="text/javascript">
$(document).ready(function() {

    function limpiar() {
        $('#search').val('');
        $('#IdUnidadMedidaTemporal').val(58);
        $('#IdProductoTemporal').val('');
    }

    //Search para Producto 
    $("#search").keyup(function() {
        $("#msg-validacion").text('');
        var search = $("#search").val();
        if (search.length > 3) {
            jQuery('input#search').typeahead({
                displayText: function(item) {
                    return item.CodigoProducto + '-' + item.NombreProducto;
                },
                afterSelect: function(item) {
                    $('#IdProductoTemporal').val(item.IdProducto);
                },
                source: function(query, process) {
                    var valor = $("#search").val();
                    link = 'ResumenInventario/buscarProductoInventario/' + valor;
                    jQuery.ajax({
                        url: link,
                        data: {
                            query: query
                        },
                        dataType: "json",
                        type: "POST",
                        success: function(data) {
                            if (data.length > 0) {
                                $("#btn-validarproducto").prop("disabled",
                                    false);
                                $("#msg-validacion").text('');
                                process(data);
                            } else {
                                $("#btn-validarproducto").prop("disabled",
                                true);
                                $("#msg-validacion").text(
                                    'No se encontro el producto');
                            }
                        }
                    });
                }
            });
        }
        return false;

    });

    var conti = 0;
    var conta = 0;
    $("#btn-validarproducto").click(function() {
        if ($("#search").val() == '' || $('#IdProductoTemporal').val() == '') {
            alert("Por favor ingrese el nombre del producto para agregarlo");
        } else { //Validamos 
            var idproducto = $('#IdProductoTemporal').val();
            var nombreproducto = $("#search").val();
            var nombreunidad = $("#IdUnidadMedidaTemporal option:selected").text();
            var idsede = $('#IdSede').val();
            var idunidad = $('#IdUnidadMedidaTemporal').val();
            var idtipoinventario = $('#IdTipoInventario').val();

            $.ajax({
                type: "GET",
                url: "ResumenInventario/validarInventario/" + idproducto + '/' + idsede + '/' +
                    idunidad,
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    if (idtipoinventario == 1) {
                        if (data.length == 0) {
                            $("#btn-validarproducto").prop("disabled", false);
                            var fila = '<tr id="fila' + conti + '">' +
                                '<td> <button type="button" class="btn btn-danger btn-sm" onclick=$("#fila' +
                                conti + '").remove();>x</button></td>' +
                                '<td> <input type="hidden" name="IdProducto[]" value="' +
                                idproducto + '">' + nombreproducto + '</td>' +
                                '<td> <input type="hidden" name="IdUnidadMedida[]" value="' +
                                idunidad + '">' + nombreunidad + '</td>' +
                                '<td> <input type="number" name="EquivalenciaUnidad[]" class="form-control sizenumber input-sm input-h" value="1" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="Stock[]" class="form-control input-sm sizenumber input-h" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="CantidadConteo[]" class="form-control sizenumber input-sm input-h" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="CostoUnitario[]" class="form-control sizenumber input-sm input-h"  onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="CostoTotal[]"  class="form-control sizenumber input-sm input-h" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '</tr>';
                            conti++;
                            $('#detalles').append(fila);
                            limpiar();
                        } else {
                            alert(
                                "El producto ya posee un inventario inicial, si desea realizar un ajuste puede crear otro resumen");
                            $("#btn-validarproducto").prop("disabled", false);
                        }
                    } else {
                        if (data.length > 0) {
                            $("#btn-validarproducto").prop("disabled", false);
                            var fila = '<tr id="fila' + conta + '">' +
                                '<td> <input type="hidden" name="IdInventario[]" value="' +data[0].IdInventario +'"> <button type="button" class="btn btn-danger btn-sm" onclick=$("#fila' +conta + '").remove();>x</button></td>' +
                                '<td> <input type="hidden" name="IdProducto[]" value="' + idproducto + '">' + nombreproducto + '</td>' +
                                '<td> <input type="hidden" name="IdUnidadMedida[]" value="' + idunidad + '">' + nombreunidad + '</td>' +
                                '<td> <input type="number" name="EquivalenciaUnidad[]" class="form-control input-sm input-h sizenumber" value="' +data[0].EquivalenciaUnidad +'" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="Stock[]" class="form-control input-sm input-h sizenumber" value="' +data[0].Stock +'" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="CantidadConteo[]" class="form-control input-sm input-h sizenumber" value="' + data[0].CantidadConteo + '"  onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="CostoUnitario[]" class="form-control input-sm input-h sizenumber" value="' + data[0].CostoUnitario + '"  onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '<td> <input type="number" name="CostoTotal[]"  class="form-control input-sm input-h sizenumber" value="' + data[0].CostoTotal + '" onkeyup="if(this.value<=0){this.value=this.value / this.value}" required></td>' +
                                '</tr>';
                            conta++;
                            $('#detalles').append(fila);
                            limpiar();

                        } else {
                            alert(
                                "El Producto no se puede insertar porque la unidad de medida no se ha registrado un inventario inicial");
                            $("#btn-validarproducto").prop("disabled", false);
                        }
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
            });
        }
    });

    $('#IdTipoInventario').on('change', function() {
        $('#detalles tbody tr').remove();
    });

    $('body').on('click', '.edit_inventario', function() {
        var fila = $(this).closest("tr");
        var id = parseInt(fila.find('td:eq(0)').text());
        var nombre_producto = fila.find('td:eq(1)').text();
        $('#Show_IdInventario').val(id);
        $.ajax({
            url: 'ResumenInventario/editarInventario/' + id,
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $('#Show_IdResumenInventario').val(data[0].IdResumenInventario);
                $('#Show_IdProducto').val(data[0].IdProducto);
                $('#Show_IdSede').val(data[0].IdSede);
                $('#Show_IdUnidadMedida').val(data[0].IdUnidadMedida);
                $('#Show_EquivalenciaUnidad').val(data[0].EquivalenciaUnidad);
                $('#Show_Stock').val(data[0].Stock);
                $('#Show_CantidadConteo').val(data[0].CantidadConteo);
                $('#Show_CostoUnitario').val(data[0].CostoUnitario);
                $('#Show_CostoTotal').val(data[0].CostoTotal);
                $('#Show_Observacion').val(data[0].ObservacionInventario);
                $('#text-inventario').text(nombre_producto + ' - ' + data[0].NombreSede
                    .toUpperCase());
                $('#modal_inventario').modal('show');

            },
            error: function() {
                alert("error peticion ajax");
            }
        });
    });

    $("#envio_inventario").on("submit", function(e) {
        e.preventDefault();
        var link = "ResumenInventario/modificarInventario";
        addEditRegistro('envio_inventario', link, luegoEditarInventario);
    });

    function luegoEditarInventario() {
        $('#modal_inventario').modal('hide');
        datatable_inventario.ajax.reload(null, false);
    }

    $("#Show_Stock").keyup(function() {
        CalcularCosto();
    });

    $("#Show_CostoUnitario").keyup(function() {
        CalcularCosto();
    });

    function CalcularCosto()
    {
        var stock = $('#Show_Stock').val();
        var costo_unit = $('#Show_CostoUnitario').val();
        if (stock != '' && costo_unit != '' && stock > 0 && costo_unit > 0 ) {
            var costo_total = stock*costo_unit;
            $('#Show_CostoTotal').val(costo_total);
        } else {
            $('#Show_CostoTotal').val('');
        }

    }


       //Eliminar Producto
       $('body').on('click', '.delete_inventario', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $('#deleteIdInventario').val(id);
            $('#deleteIdResumenInventario').val('');
            $('#DeleteMotivo').val('');
            $('#modal_delete').modal('show');
        });

    $('body').on('click', '.show_inventario', function(){
    var fila = $(this).closest("tr");
    var id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'ResumenInventario/mostrarDetalleInventario/' + id,
            type: "GET",
            dataType: 'json',
            success: function(data) {
                    $('#InvObservacion').text(data[0].Observacion);
                    $("#InvUsuarioRegistro").text(data[0].UsuarioRegistro);
                    $("#InvFechaRegistro").text(data[0].FechaRegistro);
                    $("#InvUsuarioModificacion").text(data[0].UsuarioModificacion);
                    $("#InvFechaModificacion").text(data[0].FechaModificacion);
                    $("#InvUsuarioEliminacion").text(data[0].UsuarioEliminacion);
                    $("#InvFechaEliminacion").text(data[0].FechaEliminacion);
                    $('#modal_detalle_inventario').modal('show');
            },
            error: function() {
                alert("error peticion ajax");
            }
        });
    });

       //Inventario Producto
       $('body').on('click', '.item_historial', function() {
            var fila = $(this).closest("tr");
            var id = parseInt(fila.find('td:eq(0)').text());
            var nombre_producto = fila.find('td:eq(1)').text();
            var nombre_unidad = fila.find('td:eq(2)').text();
            var nombre_sede = localStorage.getItem('nombre_sede');
           
            $('#txt_historial').text(nombre_producto+' - '+nombre_unidad + ' - '+nombre_sede );
            $("#datatable_historial").dataTable().fnDestroy();
            datatable_historial = $('#datatable_historial').DataTable({
            "ajax": {
                "url": "ResumenInventario/mostrarHistorialProductoInventario/" + id + "/" + nombre_sede,
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdInventario"},
                {"data": "Stock"},
                {"data": "CantidadConteo"},
                {"data": "Diferencia"},
                {"data": "CostoUnitario"},
                {"data": "CostoTotal"},
                {"data": "CondicionInventario"},
                {"data": "FechaInventario"},
                {
                    data: "EstadoInventario",
                    render: function(data) {
                        return estado_valor(data, 'span-estado');
                    }
                },
                {
                    data: "EstadoInventario",
                    render: function(data) {
                        return estado_valor(data, 'btn-historial');
                    }
                }
            ],
            "order":  [[ 7, 'desc' ],[ 0, 'desc' ]]
            });

            $('.historial').show();
            $('.inventario').hide();

        }); 
        
        $('body').on('click', '.show_historial', function(){
        var fila = $(this).closest("tr");
        var id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'ResumenInventario/mostrarDetalleInventario/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                        $('#InvObservacion').text(data[0].Observacion);
                        $("#InvUsuarioRegistro").text(data[0].UsuarioRegistro);
                        $("#InvFechaRegistro").text(data[0].FechaRegistro);
                        $("#InvUsuarioModificacion").text(data[0].UsuarioModificacion);
                        $("#InvFechaModificacion").text(data[0].FechaModificacion);
                        $("#InvUsuarioEliminacion").text(data[0].UsuarioEliminacion);
                        $("#InvFechaEliminacion").text(data[0].FechaEliminacion);
                        $('#modal_detalle_inventario').modal('show');
                },
                error: function() {
                    alert("error peticion ajax");
                }
            });
        });

});
</script>