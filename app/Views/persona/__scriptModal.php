<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/intlTelInput.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
      
        $('.div-ruc').hide();
        $('select#IdTipoDocumentoIdentidad').on('change', function() {
        $('.limpiar').val('');
        id = $('#IdTipoDocumentoIdentidad').val();
            if(id==4){
                $('.div-ruc').show(); 
                $('.datos-ruc').prop('required', true);
                $("#NumeroDocumentoIdentidad").attr('maxlength','11');
                $("#NumeroDocumentoIdentidad").attr("placeholder", "RUC (11 DIGITOS)");
                $(".NombreCompleto" ).hide();
                $(".ApellidoCompleto" ).hide();
                $("#txt-datos-personales").text('Datos Representante Legal');
            }else if(id==2){
                $('.div-ruc').hide();
                $('.datos-ruc').prop('required', false);
                $("#NumeroDocumentoIdentidad").attr('maxlength','8');
                $("#NumeroDocumentoIdentidad").attr("placeholder", "DNI (8 DIGITOS)");
                $(".NombreCompleto" ).show();
                $(".ApellidoCompleto" ).show(); 
                $("#txt-datos-personales").text('Datos de la Persona');
            }else{
                $("#NumeroDocumentoIdentidad").attr('maxlength','15');
                $("#NumeroDocumentoIdentidad").attr("placeholder", "");
                $(".NombreCompleto" ).show();
                $(".ApellidoCompleto" ).show(); 
                $("#txt-datos-personales").text('Datos de la Persona');
            }
       });

    
    ///Para abrir modales en persona--------------------------------------

    //Add Tipo Persona
    $("body").on("click", "#btn-IdTipoPersona", function() {
        $('#envio_tipopersona').trigger('reset');
        $('#modal_ventana_tipopersona').modal('show');
    });

    $("body").on("click", "#save_tipopersona", function() {
    addEditRegistro('envio_tipopersona', 'TipoPersona/registrarTipoPersona', luegoInsertarTipoPersona);
    });

    function luegoInsertarTipoPersona() {
    id_tipopersona = $('#id_temporal').val();
    nombre_tipopersona = $('#NombreTipoPersona_add').val();
    if (id_tipopersona != '-') {
        $("#IdTipoPersona").prepend("<option value='" + id_tipopersona + "' selected='selected'>" + nombre_tipopersona + "</option>");
    }
    $('#modal_ventana_tipopersona').modal('hide');
    }
    
     //Add Rol
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
    
    //Seccion Para Validar Telefono, Celular y Email--------------------------------

     var input1 = document.querySelector("#InputCelular");
        var input2 = document.querySelector("#InputTelefono");

        var iti1=window.intlTelInput(input1, {
            initialCountry: "pe",
            utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/utils.js"
        });

        var iti2=window.intlTelInput(input2, {
            initialCountry: "pe",
            placeholderNumberType: 'FIXED_LINE_OR_MOBILE',
            utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/utils.js"
        });
    
    
        // Para validar Telefono, las funciones reset y validar estan en el archivo validarTelefonoEmail.js
        $('#InputCelular').change(function() {  reset('InputCelular','cel'); });
        $('#InputCelular').keyup(function() {  reset('InputCelular','cel'); });
        $('#InputCelular').blur(function() { validarCelular('InputCelular','cel',iti1,'Celular')});
        //Para Celular
        $('#InputTelefono').change(function() {  reset('InputTelefono','tel'); });
        $('#InputTelefono').keyup(function() {  reset('InputTelefono','tel'); });
        $('#InputTelefono').blur(function() {  validarTelefono('InputTelefono','tel',iti2,'TelefonoFijo')}); 
        //Para email
        $('#Email').change(function() {  reset('Email','em'); });
        $('#Email').keyup(function() {  reset('Email','em'); });
        $('#Email').blur(function() { validarEmail('Email','em',null); });
     

        //Para Telefono Personal
        $('#CheckTelefono').change(function() { 
            if(this.checked) {
                var telefono_fijo= $('#InputTelefono').val();
                $('#TelefonoPersonal').val(telefono_fijo);
            }
        });


        $("#search").keyup(function(){
            $('#msg-search').hide(); 
            var search=$("#search").val();
            if (search.length > 2 && search!="") {
                    jQuery('input#search').typeahead({
                    displayText: function(item) {
                        if($('#CheckPais').prop('checked')){
                            return item.NombrePais+', '+item.NombreCapital;
                        }else{
                            return item.lugar;
                        }
                    },
                    afterSelect: function(item) {
                        if($('#CheckPais').prop('checked')){
                           $('#Nacionalidad').val(item.Nacionalidad);
                        }else{
                            $('#Nacionalidad').val('Peruano/a');
                        }
                    },
                    source: function (query, process) {
                        var valor=$("#search").val();
                        if($('#CheckPais').prop('checked')){
                           link='Persona/buscarPaisNacionalidad/'+valor;
                        }else{
                           link='Persona/buscarDepartamentoProvincia/'+valor;
                        }
                       
                            jQuery.ajax({
                                url: link,
                                data: {query:query},
                                dataType: "json",
                                type: "POST",
                                success: function (data) {
                                    console.log(data);
                                    if(data.length>0){
                                        $('#msg-search').hide(); 
                                        process(data);
                                    }else{
                                        $('#msg-search').show(); 
                                    }
                                }
                            });
                    }   
                    });
                } return false;
                
        });
      
        $( "#btn-buscardocumento" ).click(function() {
            $('#msg-documento').show();
            var num_documento=$("#NumeroDocumentoIdentidad").val();
            var tipo_documento=$('#IdTipoDocumentoIdentidad').val();
            if(tipo_documento==2){  
               link="Persona/consultarDni/"+num_documento;
               if(num_documento.length==8){
                   if(navigator.onLine){
                    buscardocumento(link,tipo_documento);
                   }else{
                       $('.limpiar').val('');
                            alertify.confirm('Mensaje del Sistema', 'Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos',
                            function() {
                                    $(".NombreCompleto" ).show();
                                    $(".ApellidoCompleto" ).show();
                                    $(".RepresentanteLegal" ).hide();
                            },
                            function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
                    
                   }
                  
               }else{
                   var digitos_faltantes= 8 - num_documento.length;
                   alert('El DNI ingresado debe ser de 8 digitos, le falta '+digitos_faltantes+' digitos');
               }
              
            }else if(tipo_documento==4) {
               link="Persona/consultarRuc/"+num_documento;
               if(num_documento.length==11){
                    if(navigator.onLine){
                       buscardocumento(link,tipo_documento);
                    }else{
                        $('.limpiar').val('');
                        alertify.confirm('Mensaje del Sistema', 'Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos',
                            function() {
                                    $(".NombreCompleto" ).show();
                                    $(".ApellidoCompleto" ).show();
                                    $(".RepresentanteLegal" ).hide();
                            },
                            function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
                
                    }
               }else{
                   var digitos_faltantes= 11 - num_documento.length;
                   alert('El RUC ingresado debe ser de 11 digitos, le falta '+digitos_faltantes+' digitos')
               }
            }else{
                alertify.alert('Mensaje del Sistema','Esta Accion es solo para la busqueda de DNI y RUC, si es otro tipo documento escribalo de  manera manual').set('closable', false)
            }
        });

        function buscardocumento(link,tipo_documento){
            $.ajax({
                type: "GET",
                url: link,
                dataType: "JSON",
                success: function(data) {
                    if(data=='no encontrado'){
                        $('.limpiar').val('');
                        if(navigator.onLine){
                            $('.limpiar').val('');
                                alertify.confirm('Mensaje del Sistema', 'Numero de Documento no Encontrado, por favor ingrese otro numero o llene los demas campos de manera manual si cree que es correcto',
                                function() {
                                    $(".NombreCompleto" ).show();
                                    $(".ApellidoCompleto" ).show();
                                    $(".RepresentanteLegal" ).hide();
                                },
                                function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
                    
                        }else{
                            alertify.confirm('Mensaje del Sistema', 'Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos',
                                function() {
                                    $(".NombreCompleto" ).show();
                                    $(".ApellidoCompleto" ).show();
                                    $(".RepresentanteLegal" ).hide();
                            },
                            function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
            
                        }
                    }else{
                        if(tipo_documento==2){
                            $('#NombreCompleto').val(data.nombres);
                            $('#ApellidoCompleto').val(data.apellidoPaterno+' '+data.apellidoMaterno);
                            $(".NombreCompleto" ).show();
                            $(".ApellidoCompleto" ).show(); 
                            $("#IdTipoPersona").val(2);
                            
                        }else{
                            console.log(data);
                            $('#RazonSocial').val(data.razonSocial);
                            $('#DireccionEmpresa').val(data.direccion);
                            $('#NombreComercial').val(data.nombreComercial);
                            $('#EstadoContribuyente').val(data.estado);
                            $('#CondicionContribuyente').val(data.condicion);
                            var num_documento=$("#NumeroDocumentoIdentidad").val();
                            var tipo_ruc=num_documento.substring(0,2);
                            
                            switch (tipo_ruc) {
                            case '10': //Persona Natural
                                var dni=num_documento.substring(2,10);
                                buscardni(dni);
                                $(".NombreCompleto" ).show();
                                $(".ApellidoCompleto" ).show();
                                $(".RepresentanteLegal" ).hide();
                                $('#UbicacionEmpresa').val('-');
                                $("#IdTipoPersona").val(2);
                                break;
                            case '20': //Perspona Juridica
                                $(".NombreCompleto" ).hide();
                                $(".ApellidoCompleto" ).hide();
                                $(".RepresentanteLegal" ).show();
                                $("#RepresentanteLegal" ).val('');
                                $('#UbicacionEmpresa').val(data.departamento+'-'+data.provincia+'-'+data.distrito);
                                $("#IdTipoPersona").val(1);
                                break;
                            default:  //Persona extrangera o  con carnet militar
                                dividirnombre();
                                $(".NombreCompleto" ).show();
                                $(".ApellidoCompleto" ).show();
                                $(".RepresentanteLegal" ).hide();
                                $('#UbicacionEmpresa').val('-');
                                $("#IdTipoPersona").val(2);
                            } 
                            
                        }
                       
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
            });
        }


        //para representante legal
        $( "#btn-buscar-representante" ).click(function() {
            var num_dni= $('#RepresentanteLegal').val();
            if(num_dni.length==8){
               if(navigator.onLine){
                   buscardni(num_dni);
               }else{
                $('.limpiar').val('');
                 alertify.alert('Mensaje del Sistema','Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar el Apellido y Nombres del Representante Legal manualmente y lo registraremos en la Base de Datos').set('closable', false);
               }
            }else{
                alert('La Busqueda es solo para DNI y este debe ser de 8 Digitos');
            }
           
        });
        
        function buscardni(num_dni){
            $.ajax({
                        type: "GET",
                        url: "Persona/consultarDni/"+num_dni,
                        dataType: "JSON",
                        success: function(data) {
                            if(data=='no encontrado'){
                               if($('#RazonSocial').val()=='' || $('#RazonSocial')=='-'){
                                    alertify.confirm('Mensaje del Sistema', 'DNI no Encontrado, por favor ingrese otro numero o llene los demas campos de manera manual si cree que es correcto',
                                    function() {
                                        $(".NombreCompleto" ).show();
                                        $(".ApellidoCompleto" ).show();
                                        $(".RepresentanteLegal" ).hide();
                                        $('#RepresentanteLegal').val('');
                                    },
                                    function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
                               }else{
                                  dividirnombre();
                               }
                        
                            }else{
                                $('#RepresentanteLegal').val(data.nombres+" "+data.apellidoPaterno+' '+data.apellidoMaterno);
                                $("#NombreCompleto" ).val(data.nombres);
                                $("#ApellidoCompleto" ).val(data.apellidoPaterno+' '+data.apellidoMaterno);
                            }
                        },error: function(jqXHR) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.error('Al parecer hubo un error en el Servidor');
                        }
                    });
        }


        function dividirnombre(){
            var nombre_completo=$('#RazonSocial').val();
            var nombre_separado=nombre_completo.split(' ');
            var longitud=nombre_separado.length;
                if(longitud==3){
                    $('#NombreCompleto').val(nombre_separado[2]);
                    $('#ApellidoCompleto').val(nombre_separado[0]+' '+nombre_separado[1]);
                }else if(longitud==4){
                    $('#NombreCompleto').val(nombre_separado[2]+' '+nombre_separado[3]);
                    $('#ApellidoCompleto').val(nombre_separado[0]+' '+nombre_separado[1]);
                    }else if(longitud==5){
                    $('#NombreCompleto').val(nombre_separado[2]+' '+nombre_separado[3]+' '+nombre_separado[4]);
                    $('#ApellidoCompleto').val(nombre_separado[0]+' '+nombre_separado[1]);
                    }else{
                    $('#NombreCompleto').val(nombre_separado[3]+' '+nombre_separado[4]+' '+nombre_separado[5]);
                    $('#ApellidoCompleto').val(nombre_separado[0]+' '+nombre_separado[1]+' '+nombre_separado[2]);
                    }
        }
        ///Nombre Comercial 
        $('#CheckComercial').change(function() { 
            if(this.checked) {
                var razon_social=$('#RazonSocial').val();
                $('#NombreComercial').val(razon_social);
            }
        });

       //Para la Foto

       document.getElementById('file-input').onchange = function () {
            $('#imgSalida').empty();
            nombrefoto=document.getElementById('file-input').files[0].name;
            $('#NombreFoto').val(nombrefoto);
            console.log(nombrefoto);
        }

       //Para adminsitrar direcciones
       $( "#nueva_direccion").click(function() {
            $("#nueva_direccion").hide();
            $("#envio_direccion").show();
            $("#Descripcion").val('');
            $("#Direccion").val('');
            $("#IdDireccionPersona").val('');
       });

       $( "#save_direccion").click(function() {
            var IdDireccionPersona = $('#IdDireccionPersona').val();
            if (IdDireccionPersona == "") {
                var link = "Persona/registrarDireccion";
            } else {
                var link = "Persona/modificarDireccion";
            }
            addEditRegistro('envio_direccion', link, luegoInsertarEditarDireccion);
            $("#nueva_direccion").show();
            $("#envio_direccion").hide();
       });
       function luegoInsertarEditarDireccion(){
           var IdDireccionPersona = $('#IdDireccionPersona').val();
           var id_direccion = $('#id_temporal').val();
           var descripcion  = $('#Descripcion').val();
           var direccion    = $('#Direccion').val();
           var fila         = $('#Fila').val();
           var fila_nueva   = parseInt(fila)+1;
           
           if(IdDireccionPersona ==""){
                var span = estado_valor('1', 'span-estado');
                var button = estado_valor('1', 'btn-direccion');
                var html = '<tr>' +
                                        '<td style="display:none;">' +id_direccion+ '</td>' +
                                        '<td>' + descripcion + '</td>' +
                                        '<td>' + direccion + '</td>' +
                                        '<td>' + span + '</td>' +
                                        '<td>' + button +'</td>'+
                                        '<td style="display:none;">' + fila_nueva +'</td>'+
                            '</tr>';
                
                $('#tabla_direccion tbody').append(html);
           }else{
                $($('#tabla_direccion').find('tbody > tr')[fila]).children('td')[1].innerHTML = descripcion;
                $($('#tabla_direccion').find('tbody > tr')[fila]).children('td')[2].innerHTML = direccion;  
           }

       }

       $( "#cancelar").click(function() {
            $("#nueva_direccion").show();
            $("#envio_direccion").hide();
       });

       //Editar Direccion
       $('body').on('click', '.item_edit_direccion', function() {
            var fila = $(this).closest("tr");
            var id = parseInt(fila.find('td:eq(0)').text());
            var descripcion = fila.find("td:eq(1)").text();
            var direccion = fila.find("td:eq(2)").text();
            var fila_int = fila.find("td:eq(5)").text();
            console.log(fila_int);
            $('#Descripcion').val(descripcion);
            $('#Direccion').val(direccion);
            $('#IdDireccionPersona').val(id);
            $('#Fila').val(fila_int);
            $("#nueva_direccion").hide();
            $("#envio_direccion").show();

       });

       $('body').on('click', '.item_delete_direccion', function() {
            var fila = $(this).closest("tr");
            var id = parseInt(fila.find('td:eq(0)').text());
            var fila_int = fila.find("td:eq(5)").text();
            $('#Fila').val(fila_int);
            var estado_direccion = 0;
            console.log(id);
            alertify.confirm('Ventana Eliminar', 'Esta seguro de cambiar el estado del registro ?',
            function() {
                modificarEstadoDireccion(id, estado_direccion,fila_int);
            },
            function() {});
       });

       
      //guardar edicion 

      $('body').on('click', '.item_restaurar_direccion', function() {
            var fila = $(this).closest("tr");
            var id = parseInt(fila.find('td:eq(0)').text());
            var fila_int = fila.find("td:eq(5)").text();
            var estado_direccion = 1;
            console.log(id);
            alertify.confirm('Ventana Eliminar', 'Esta seguro de restaurar la direccion ?',
            function() {
                modificarEstadoDireccion(id, estado_direccion,fila_int);
            },
            function() {});
       });

       function modificarEstadoDireccion(id, estado_direccion,fila_int) {
        $.ajax({
            type: "POST",
            url: "Persona/modificarEstadoDireccion/" + id + "/" + estado_direccion,
            dataType: "JSON",
            success: function(data) {
                $($('#tabla_direccion').find('tbody > tr')[fila_int]).children('td')[3].innerHTML = estado_valor(estado_direccion, 'span-estado');
                $($('#tabla_direccion').find('tbody > tr')[fila_int]).children('td')[4].innerHTML = estado_valor(estado_direccion, 'btn-direccion'); 
                alertify.success('El Estado del Registro se Modifico Correctamente');
            }
        });
    }


   });

</script>