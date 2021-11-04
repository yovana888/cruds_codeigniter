
<script type="text/javascript">
$(document).ready(function() {
    $('#texto_add1').text("");
    $('#texto_add2').text("");
    $("#gif").css("display", "none");

     datatable_tipocambio = $('#datatable_tipocambio').DataTable({
            "ajax": {
                "url": "TipoCambio/obtenerTiposCambio",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [

                {"data": "IdTipoCambio"},
                {"data": "FechaCambio"},
                {"defaultContent": "SOL"},
                {"data": "NombreMoneda"},
                {"data": "TipoCambioCompra"},
                {"data": "TipoCambioVenta"},
                {"data": "FechaRegistro"},
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
        var Id = $('#IdTipoCambio').val();
        if(Id ==""){
            var link = "TipoCambio/registrarTipoCambio";
        }else{
            var link = "TipoCambio/modificarTipoCambio/"+Id;
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarTipoCambio);
        });

        function luegoInsertarEditarTipoCambio(){
            $('#envio_search').trigger('reset');
            $('#modal_cambio').modal('hide');
            datatable_tipocambio.ajax.reload(null, false);
        }

    /*La funcion para hacer reset del formulario esta en el mismo boton cargar datos*/
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $('#texto_add1').text("");
        $('#texto_add2').text("");
        $("#TipoCambioCompra").val('');
        $("#TipoCambioVenta").val('');
        $.ajax({
            url: 'TipoCambio/editarTipoCambio/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#IdTipoCambio').val(data[0].IdTipoCambio);
                $('select#moneda_select').val(data[0].IdMonedaDestino+"_"+data[0].CodigoMoneda+"_"+data[0].NombreMoneda);
                $('#IdMonedaDestino').val(data[0].IdMonedaDestino);
                $("#TipoCambioCompra").css("display", "block");
                $('#TipoCambioVenta').val(data[0].TipoCambioVenta);
                $('#TipoCambioCompra').val(data[0].TipoCambioCompra);
                $('#modal_cambio').modal('show');
            },
            error: function () {
                alertify.error("Error en el envio de datos");
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
                url: "TipoCambio/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_tipocambio.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }


    $('select#moneda_select').on('change', function() {
        $('#texto_add1').text("");
        $('#texto_add2').text("");
        $("#TipoCambioCompra").val('');
        $("#TipoCambioVenta").val('');
        
        if ($('#moneda_select').val()!=''){
            $("#gif").css("display", "block");
            datosMoneda = document.getElementById('moneda_select').value.split('_');
            $('#IdMonedaDestino').val(datosMoneda[0]); //0 = id; 1=simbolo; 2=nombre;
            var monedaDestino = datosMoneda[1]; 
            var nombreMoneda  = datosMoneda[2]; 
            switch (monedaDestino) {
                case 'USD': case 'CAD': case 'GBP': case 'JPY': case 'CHF': case 'EUR':
                link="TipoCambio/obtenerTipoCambioSBS/"+monedaDestino;
                break;
                default: 
                link="TipoCambio/obtenerTipoCambioOTROS/"+monedaDestino; //solo traera la venta
                }
            $.ajax({
                type: "GET",
                url: link,
                dataType: "JSON",
                success: function(data) {
                    $("#gif").css("display", "none");
                    if(data['compra']==' '){
                        $("#TipoCambioCompra").css("display", "none");
                        $("#label-compra").css("display", "none");
                    }else{
                        $("#TipoCambioCompra").css("display", "block");
                        $("#label-compra").css("display", "block");
                    }
                    if(data['venta']=='error'){
                        alert('La moneda Ingresada no se encuentra registrado en la SBS: https://www.sbs.gob.pe/app/pp/SISTIP_PORTAL/Paginas/Publicacion/TipoCambioContable.aspx');
                    }else{
                        $('#TipoCambioCompra').val(data['compra']);
                        $('#TipoCambioVenta').val(data['venta']);
                        $('#FechaCambio').val(data['fechacambio']);
                        $('#texto_add1').text('Tipo de Cambio al: '+data['fechacambio']+' --Fuente(SBS)');
                        $('#texto_add2').text('1 '+monedaDestino+' equivale a: '+data['venta']+' Soles');
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
            });
        } //FIN DEL IF
    }); // FIN DEL CAMBIO SELECT

    $("#pdf").click(function() {
            var tipo='pdf';
            window.open('TipoCambio/generarReporte/'+tipo); //generar
    });

    $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('TipoCambio/generarReporte/'+tipo);
    });

});

</script>

