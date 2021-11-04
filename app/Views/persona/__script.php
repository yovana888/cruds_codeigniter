<script type="text/javascript">
   $(document).ready(function(){
        datatable_persona= $('#datatable_persona').DataTable({
            "ajax": {
                "url": "Persona/mostrarListadoPersona",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdPersona"},
                {"data": "NombreAbreviado"},
                {"data": null,
                    render: function(data, type, row, meta)
                    {   
                        if(row.IdTipoPersona==1){
                            return row.NumeroDocumentoIdentidad+'<br> <a href="#" class="item_razon_social">'+ row.RazonSocial+'</a>';
                        }else if(row.IdTipoDocumentoIdentidad==4){
                            return '<a href="#" class="item_razon_social">'+ row.NumeroDocumentoIdentidad+'</a>';
                        }else{
                            return row.NumeroDocumentoIdentidad;
                        }
                       
                    },
                },
                {"data": null,
                    render: function(data, type, row, meta)
                    {
                        return row.NombreCompleto+' '+row.ApellidoCompleto;
                    },
                },
                {"data": "Email"},
                {"data": null,
                    render: function(data, type, row, meta)
                    {
                        return row.Celular+'<br> '+row.TelefonoPersonal;
                    },
                },
                {
                    data: "EstadoPersona",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "EstadoPersona",
                    render: function(data) {return estado_valor(data, 'btn-persona');}
                }
            ]
        });

        $("#envio_search").on("submit", function(e) {
            e.preventDefault();
            var IdPersona = $('#IdPersona').val();
            if (IdPersona == "") {
                var link = "Persona/registrarPersona";
            } else {
                var link = "Persona/modificarPersona";
            }
            addEditRegistro('envio_search',link,luegoInsertarEditarPersona);
        });
        
        function luegoInsertarEditarPersona(){
            $('#modal_persona').modal('hide');
            $('#envio_search').trigger('reset');
            datatable_persona.ajax.reload(null, false);
        }


         //mostrar detalles en el modal __show
    $('body').on('click', '.item_show', function() {
        var fila = $(this).closest("tr");
        var id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'Persona/mostrarDetalles/' + id,
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $("#show_NombrePersona").text(data['detalle'][0].NombreCompleto+' '+data['detalle'][0].ApellidoCompleto+data['detalle'][0].RepresentanteLegal);
                $("#show_TipoPersona").text(data['detalle'][0].NombreTipoPersona);
                $("#show_NombreRol").text(data['detalle'][0].NombreRol);
                $("#show_TelefonoFijo").text(data['detalle'][0].TelefonoFijo);
                $("#show_LugarNacimiento").text(data['detalle'][0].LugarNacimiento);
                $("#show_FechaNacimiento").text(data['detalle'][0].FechaNacimiento);
                $("#show_Nacionalidad").text(data['detalle'][0].Nacionalidad);
                $("#show_NombreGenero").text(data['detalle'][0].NombreGenero);
                $("#show_NombreEstadoCivil").text(data['detalle'][0].NombreEstadoCivil);
                $("#show_Observacion").text(data['detalle'][0].Observacion);
                $('#show_Foto').attr('src','assets/images/personas/'+data['detalle'][0].Foto);
                
                $("#show_UsuarioRegistro").text(data['detalle'][0].UsuarioRegistro);
                $("#show_FechaRegistro").text(data['detalle'][0].FechaRegistro);
                $("#show_MaquinaRegistro").text(data['detalle'][0].MaquinaRegistro);
                $("#show_UsuarioModificacion").text(data['detalle'][0].UsuarioModificacion);
                $("#show_FechaModificacion").text(data['detalle'][0].FechaModificacion);
                $("#show_MaquinaModificacion").text(data['detalle'][0].MaquinaModificacion);
                $("#show_UsuarioEliminacion").text(data['detalle'][0].UsuarioEliminacion);
                $("#show_FechaEliminacion").text(data['detalle'][0].FechaEliminacion);
                $("#show_MaquinaEliminacion").text(data['detalle'][0].MaquinaEliminacion);

                //Para Direcciones
              
                $('#tabla_direccion tbody tr').remove();
                for(var i=0 ; i < data['direccion'].length; i++){
                    var html = '<tr>' +
                                '<td style="display:none;">' + data['direccion'][i].IdDireccionPersona + '</td>' +
                                '<td>' + data['direccion'][i].Descripcion + '</td>' +
                                '<td>' + data['direccion'][i].Direccion + '</td>' +
                                '<td>' + estado_valor(data['direccion'][i].EstadoDireccion, 'span-estado') + '</td>' +
                                '<td>' + estado_valor(data['direccion'][i].EstadoDireccion, 'btn-direccion') +'</td>'+
                                '<td style="display:none;">' + i + '</td>' +
                            '</tr>';
                    $('#tabla_direccion tbody').append(html);
                    $('#Fila').val(i);
                }
                $("#IdPersonaDetalle").val(id);
                $("#nueva_direccion").show();
                $("#envio_direccion").hide();
                $('#modal_detalles').modal('show');
            },
            error: function() {
                alert("Error peticion ajax en el Servidor");
            }
        });
    });


    $('body').on('click', '.item_razon_social', function() {
        var fila = $(this).closest("tr");
        var id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'Persona/mostrarRazonSocial/'+ id,
            type: "GET",
            dataType: 'json',
            success: function(data) {
    
                $("#show_NombreComercial").text(data[0].NombreComercial);
                $("#show_CondicionContribuyente").text(data[0].CondicionContribuyente);
                $("#show_EstadoContribuyente").text(data[0].EstadoContribuyente);
                $("#show_UbicacionEmpresa").text(data[0].UbicacionEmpresa);
                $('#modal_razon_social').modal('show');
            },
            error: function() {
                alert("Error peticion ajax en el Servidor");
            }
        });
    });


     //Funcion cargar Datos
     $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Persona/editarPersona/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $("#msg-search").hide();
                    $("#IdPersona").val(data.IdPersona)
                    $("#IdTipoPersona").val(data.IdTipoPersona);
                    $("#IdTipoDocumentoIdentidad").val(data.IdTipoDocumentoIdentidad);
                    $("#NumeroDocumentoIdentidad").val(data.NumeroDocumentoIdentidad);
                    $("#ApellidoCompleto").val(data.ApellidoCompleto);
                    $("#NombreCompleto").val(data.NombreCompleto);
                    $("input[name=IdGenero][value="+data.IdGenero+"]").prop("checked",true);
                    $("#FechaNacimiento").val(data.FechaNacimiento);
                    $("#search").val(data.LugarNacimiento);
                    $("#Nacionalidad").val(data.Nacionalidad);
                    $("#IdEstadoCivil").val(data.IdEstadoCivil);
                    $(".NombreCompleto" ).show()
                    $(".ApellidoCompleto" ).show(); 
                    //Para ruc
                    var id = $('#IdTipoDocumentoIdentidad').val();
                    if(id==4){
                        if(data.IdTipoPersona==1){ //persona juridica
                            $(".NombreCompleto" ).hide()
                            $(".ApellidoCompleto" ).hide();
                            $(".RepresentanteLegal").show();  
                        }else{ 
                            $(".NombreCompleto" ).show()
                            $(".ApellidoCompleto" ).show(); 
                            $(".RepresentanteLegal").hide();  
                        }
                        $('.div-ruc').show(); 
                        $('.datos-ruc').prop('required', true);
                        $('.div-ruc').show(); 
                        $('.datos-ruc').prop('required', true);
                    }else{
                        $('.div-ruc').hide(); 
                        $('.datos-ruc').prop('required', false);
                    }

                    $("#RazonSocial").val(data.RazonSocial);
                    $(".divempresa").hide();
                    $("#RepresentanteLegal").val(data.RepresentanteLegal);
                    $("#EstadoContribuyente").val(data.EstadoContribuyente);
                    $("#NombreComercial").val(data.NombreComercial);
                    $("#CondicionContribuyente").val(data.CondicionContribuyente);

                    //resto de campos
                    $(".DireccionPrincipal").hide();
                    $("#TelefonoFijo").val(data.TelefonoFijo);
                    $("#InputTelefono").val(data.TelefonoFijo);
                    $("#TelefonoPersonal").val(data.TelefonoPersonal);
                    $("#Celular").val(data.Celular);
                    $("#InputCelular").val(data.Celular);
                    $("#Email").val(data.Email);
                    $("#IdRol").val(data.IdRol);
                    $("#Observacion").val(data.Observacion);
                    $('#NombreFoto').val(data.Foto);
                    $('#UbicacionEmpresa').val(data.UbicacionEmpresa);
                    $('#imgSalida').attr('src','assets/images/personas/'+data.Foto);
                    $('#modal_persona').modal('show');
                    
                },
                error: function() {
                    alert("Error peticion ajax en el Servidor");
                }
            });
        });

    //Para Cambiar Estado
     //eliminar
     $('body').on('click', '.item_delete', function() {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        var estado_persona = 0;
        alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ' + id +'?',

            function() {
                modificarIndicadorEstado(id, estado_persona);
            },
            function() {});
    });

    //restaurar
    $('body').on('click', '.item_restaurar', function() {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        var estado_persona = 1;
        alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

            function() {
                modificarIndicadorEstado(id, estado_persona);
            },
            function() {});
    });

    function modificarIndicadorEstado(id, estado_persona) {
        $.ajax({
            type: "POST",
            url: "Persona/modificarIndicadorEstado/" + id + "/" + estado_persona,
            dataType: "JSON",
            success: function(data) {
                datatable_persona.ajax.reload(null, false);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('El Estado del Registro se Modifico Correctamente');
            }
        });
    }


    //Reportes
    $( "#procesar").click(function() {

        var tipodocumento=$('#IdReporteDocumento').val();
        var tipo = $('input:radio[name=rb-reporte]:checked').val();
        if(tipo=='pdf'){
            window.open('Persona/generarReporte/' + tipo + '/' + tipodocumento,"ventana1","width=780,height=600,scrollbars=NO");
        }else{
            window.open('Persona/generarReporte/' + tipo + '/' + tipodocumento);
        }
            
    });
    
});

</script>