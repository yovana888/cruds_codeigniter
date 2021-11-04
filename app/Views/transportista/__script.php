<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/intlTelInput.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        datatable_transportista= $('#datatable_transportista').DataTable({
            "ajax": {
                "url": "Transportista/obtenerTransportistas",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdTransportista"},
                {"data": "NumeroConstanciaInscripcion"},
                {"data": "NumeroLicenciaConducir"},
                {"data": null,
                    render: function(data, type, row, meta)
                    {
                        return row.NombreCompleto+' '+row.ApellidoCompleto;
                    },
                },
                {"data": "NumeroDocumentoIdentidad"},
                {"data": "NombreRol"},
                {
                    data: "EstadoTransportista",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "EstadoTransportista",
                    render: function(data) {return estado_valor(data, 'btn-transportista');}
                }
            ]

        });
   
            //Nueva Persona
            $('#btn-nueva-persona').click(function() {
                $('#nuevo').show();
                $('#editar').hide();
                $('#envio_search').trigger('reset');
                $('#imgSalida').attr('src','assets/images/personas/persona.png');
                $('#NombreFoto').val('persona.png');
                $('#div-direccion').show();
                $('#estado_condicion').text('');
                $('#IdPersona').val('');
                $('#IdTrasportista').val('');
            });

            $('#btn-cancelar').click(function() {
                $('#nuevo').hide();
                $('#editar').show();
                $('#envio_search').trigger('reset');
                $('#imgSalida').attr('src','assets/images/personas/persona.png');
                $('#NombreFoto').val('persona.png');
                $('#div-direccion').hide();
                $('#estado_condicion').text('');
                $('#IdPersona').val('');
                $('#IdTrasportista').val('');
            });
            
        
            $("#envio_search").on("submit", function(e) {
                e.preventDefault();
                var IdPersona = $('#IdPersona').val();
                var IdTransportista = $('#IdTransportista').val();
                if (IdPersona == ""  && IdTransportista=="") {
                    var link = "Transportista/registrarPersonaTransportista";
                } else if(IdTransportista==""){
                    var link = "Transportista/registrarTransportista";
                }else{
                    var link = "Transportista/modificarTransportista";
                }
                addEditRegistro('envio_search',link,luegoInsertarEditarTransportista);
            });
        
            function luegoInsertarEditarTransportista(){
                $('#modal_transportista').modal('hide');
                $('#envio_search').trigger('reset');
                datatable_transportista.ajax.reload(null, false);
            }

        //Para Cargar Datos
        
        //Funcion cargar Datos
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Transportista/editarTransportista/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#nuevo').hide();
                    $('#editar').hide();
                    $("#IdPersona").val(data[0].IdPersona);
                    $("#IdTransportista").val(id);
                    $("#NumeroDocumentoIdentidad").val(data[0].NumeroDocumentoIdentidad);
                    $("#ApellidoCompleto").val(data[0].ApellidoCompleto);
                    $("#NombreCompleto").val(data[0].NombreCompleto);
                    $("input[name=IdGenero][value="+data[0].IdGenero+"]").prop("checked",true);
                    $("#FechaNacimiento").val(data[0].FechaNacimiento);
                    $("#LugarNacimiento").val(data[0].LugarNacimiento);
                    $("#Nacionalidad").val(data[0].Nacionalidad);
                    $("#IdEstadoCivil").val(data[0].IdEstadoCivil);

                    $("#RazonSocial").val(data[0].RazonSocial);
                    $("#EstadoContribuyente").val(data[0].EstadoContribuyente);
                    $("#NombreComercial").val(data[0].NombreComercial);
                    $("#CondicionContribuyente").val(data[0].CondicionContribuyente);

                    //resto de campos
                    $("#div-direccion").hide();
                    $("#TelefonoFijo").val(data[0].TelefonoFijo);
                    $("#InputTelefono").val(data[0].TelefonoFijo);
                    $("#Celular").val(data[0].Celular);
                    $("#InputCelular").val(data[0].Celular);
                    $("#Email").val(data[0].Email);
                    $("#IdRol").val(data[0].IdRol);
                    $("#Observacion").val(data[0].Observacion);
                    $('#NombreFoto').val(data[0].Foto);
                    $('#UbicacionEmpresa').val(data[0].UbicacionEmpresa);
                    $('#imgSalida').attr('src','assets/images/personas/'+data[0].Foto);
                    $("#TelefonoFijo").val(data[0].TelefonoFijo);
                    $("#NumeroConstanciaInscripcion").val(data[0].NumeroConstanciaInscripcion);
                    $("#NumeroLicenciaConducir").val(data[0].NumeroLicenciaConducir);
                    $('.smg').hide();
                    $('#msg-search-lugar').hide();
                    $('#modal_transportista').modal('show');
                    
                },
                error: function() {
                    alert("Error peticion ajax en el Servidor");
                }
            });
        });


        //Agregar Nuevo Rol
        $("body").on("click", "#btn-Rol", function() {
            $('#envio_rol').trigger('reset');
            $('#modal_ventana_rol').modal('show');
        });
        
        $("body").on("click", "#save_rol", function() {
        addEditRegistro('envio_rol', 'Rol/registrarRol', luegoInsertarRol);
        });

        function luegoInsertarRol() {
        id_rol = $('#id_temporal').val();
        nombre_rol=$('#NombreRol_add').val();
        if (id_rol != '-') {
            $("#IdRol").prepend("<option value='" + id_rol + "' selected='selected'>" + nombre_rol + "</option>");
        }
        $('#modal_ventana_rol').modal('hide');
        }

         //Eliminar
        $('body').on('click', '.item_delete', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var estado_transportista = 0;
            alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ' + id +'?',

                function() {
                    modificarIndicadorEstado(id, estado_transportista);
                },
                function() {});
        });

            //restaurar
            $('body').on('click', '.item_restaurar', function() {
                fila = $(this).closest("tr");
                const id = parseInt(fila.find('td:eq(0)').text());
                var estado_transportista = 1;
                alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                    function() {
                        modificarIndicadorEstado(id, estado_transportista);
                    },
                    function() {});
            });

            function modificarIndicadorEstado(id, estado_transportista) {
                $.ajax({
                    type: "POST",
                    url: "Transportista/modificarIndicadorEstado/" + id + "/" + estado_transportista,
                    dataType: "JSON",
                    success: function(data) {
                        datatable_transportista.ajax.reload(null, false);
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('El Estado del Registro se Modifico Correctamente');
                    }
                });
            }

            
            //Reportes
            $( "#pdf").click(function() {
                var tipo='pdf';
                window.open('Transportista/generarReporte/' + tipo,"ventana1","width=780,height=600,scrollbars=NO");     
            });

            $( "#xls").click(function() {
                var tipo='xlsx';
                window.open('Transportista/generarReporte/'+tipo);    
            });

        });
</script>