<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/intlTelInput.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        datatable_empleado= $('#datatable_empleado').DataTable({
            "ajax": {
                "url": "Empleado/obtenerEmpleados",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdEmpleado"},
                {"data": "NombreSede"},
                {"data": "NumeroDocumentoIdentidad"},
                {"data": null,
                    render: function(data, type, row, meta)
                    {
                        return row.NombreCompleto+' '+row.ApellidoCompleto;
                    },
                },
                {"data": "NombreRol"},
                {"data": "FechaIngreso"},
                {"data": "Sueldo"},
                {
                    data: "EstadoEmpleado",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "EstadoEmpleado",
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
                $('#IdEmpleado').val('');
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
                $('#IdEmpleado').val('');
            });
            
        
            $("#envio_search").on("submit", function(e) {
                e.preventDefault();
                var IdPersona = $('#IdPersona').val();
                var IdEmpleado = $('#IdEmpleado').val();
                if (IdPersona == ""  && IdEmpleado=="") {
                    var link = "Empleado/registrarPersonaEmpleado";
                } else if(IdEmpleado==""){
                    var link = "Empleado/registrarEmpleado";
                }else{
                    var link = "Empleado/modificarEmpleado";
                }
                addEditRegistro('envio_search',link,luegoInsertarEditarEmpleado);
            });
        
            function luegoInsertarEditarEmpleado(){
                $('#modal_empleado').modal('hide');
                $('#envio_search').trigger('reset');
                datatable_empleado.ajax.reload(null, false);
            }

        //Para Cargar Datos
        
        //Funcion cargar Datos
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Empleado/editarEmpleado/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#nuevo').hide();
                    $('#editar').hide();
                    $("#IdPersona").val(data[0].IdPersona);
                    $("#IdEmpleado").val(id);
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
                    $("#FechaIngreso").val(data[0].FechaIngreso);
                    $("#Sueldo").val(data[0].Sueldo);
                    $("#IdSede").val(data[0].IdSede);
                    $('.smg').hide();
                    $('#msg-search-lugar').hide();
                    $('#modal_empleado').modal('show');
                    
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
            var estado_empleado = 0;
            alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ' + id +'?',

                function() {
                    modificarIndicadorEstado(id, estado_empleado);
                },
                function() {});
        });

            //restaurar
            $('body').on('click', '.item_restaurar', function() {
                fila = $(this).closest("tr");
                const id = parseInt(fila.find('td:eq(0)').text());
                var estado_empleado = 1;
                alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                    function() {
                        modificarIndicadorEstado(id, estado_empleado);
                    },
                    function() {});
            });

            function modificarIndicadorEstado(id, estado_empleado) {
                $.ajax({
                    type: "POST",
                    url: "Empleado/modificarIndicadorEstado/" + id + "/" + estado_empleado,
                    dataType: "JSON",
                    success: function(data) {
                        datatable_empleado.ajax.reload(null, false);
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success('El Estado del Registro se Modifico Correctamente');
                    }
                });
            }
            
            //Reportes
            $( "#pdf").click(function() {
                var tipo='pdf';
                window.open('Empleado/generarReporte/' + tipo,"ventana1","width=780,height=600,scrollbars=NO");     
            });

            $( "#xls").click(function() {
                var tipo='xlsx';
                window.open('Empleado/generarReporte/'+tipo);    
            });

        });
</script>