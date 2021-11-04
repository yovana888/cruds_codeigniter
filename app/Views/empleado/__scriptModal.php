<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/intlTelInput.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       
        //Buscar Persona
        $("#search").keyup(function(){
            $('#msg-search').hide(); 
            var search=$("#search").val();
            if (search.length > 3) {
                    $('#div-direccion').hide();
                    jQuery('input#search').typeahead({
                    displayText: function(item) {
                        return item.NombreCompleto + ' ' + item.ApellidoCompleto + ' - '+item.NumeroDocumentoIdentidad+ ' - '+item.NombreRol;
                    },
                    afterSelect: function(item) {
                        $('#IdPersona').val(item.IdPersona);
                        $('#IdTransportista').val('');
                        $('#NombreCompleto').val(item.NombreCompleto);
                        $('#ApellidoCompleto').val(item.ApellidoCompleto);
                        $('#NumeroDocumentoIdentidad').val(item.NumeroDocumentoIdentidad);
                        $('#TelefonoFijo').val(item.TelefonoFijo);
                        $('#InputTelefono').val(item.TelefonoFijo);
                        $('#Nacionalidad').val(item.Nacionalidad);
                        $('#LugarNacimiento').val(item.LugarNacimiento);
                        $('#FechaNacimiento').val(item.FechaNacimiento);
                        $('#Email').val(item.Email);
                        $('#Celular').val(item.Celular);
                        $('#InputCelular').val(item.Celular);
                        $('#Observacion').val(item.Observacion);
                        $('#IdRol').val(item.IdRol);
                        $('#NombreFoto').val(item.Foto);
                        $('#EstadoContribuyente').val(item.EstadoContribuyente);
                        $('#CondicionContribuyente').val(item.CondicionContribuyente);
                        $('#RazonSocial').val(item.RazonSocial);
                        $('#NombreComercial').val(item.NombreComercial);
                        $('#imgSalida').attr('src','assets/images/personas/'+item.Foto);
                        $("input[name=IdGenero][value="+item.IdGenero+"]").prop("checked",true);
                        $("#IdEstadoCivil").val(item.IdEstadoCivil);

                    },
                    source: function (query, process) {
                        var valor=$("#search").val();
                        link='Transportista/buscarPersona/'+valor;
                            jQuery.ajax({
                                url: link,
                                data: {query:query},
                                dataType: "json",
                                type: "POST",
                                success: function (data) {
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
        
        //Nacionalidad y Lugar de Nacimiento

        $("#LugarNacimiento").keyup(function(){
            $('#msg-search-lugar').hide(); 
            var search=$("#LugarNacimiento").val();
            if (search.length > 2 && search!="") {
                    jQuery('input#LugarNacimiento').typeahead({
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
                        var valor=$("#LugarNacimiento").val();
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
                                    if(data.length>0){
                                        $('#msg-search-lugar').hide(); 
                                        process(data);
                                    }else{
                                        $('#msg-search-lugar').show(); 
                                       
                                    }
                                }
                            });
                    }   
                    });
                } return false;
                
        });
       

         
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
      

         //FOTO
        $(function() {
        $('#file-input').change(function(e) {
            addImage(e);
            });
            function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;
            if (!file.type.match(imageType))
                return;
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
            }
            function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida').attr("src",result);
            }
            });

         //buscarDNI,RUC
            $('select#IdTipoDocumentoIdentidad').on('change', function() {
            $('#estado_condicion').text('');
            id = $('#IdTipoDocumentoIdentidad').val();
                if(id==4){ 
                    $("#NumDocumento").attr('maxlength','11');
                    $("#NumDocumento").attr("placeholder", "RUC (11 DIGITOS)");
                }else if(id==2){
                    $("#NumDocumento").attr('maxlength','8');
                    $("#NumDocumento").attr("placeholder", "DNI (8 DIGITOS)");
                }else{
                    $("#NumDocumento").attr('maxlength','15');
                    $("#NumDocumento").attr("placeholder", "");
                }
            });
        
            
            //Cambio de Foto
            document.getElementById('file-input').onchange = function () {
            $('#imgSalida').empty();
            nombrefoto=document.getElementById('file-input').files[0].name;
            $('#NombreFoto').val(nombrefoto);
            console.log(nombrefoto);
            }

            //Buscar Documento
            $('#btn-buscardocumento').click(function() {
                    var num_documento=$("#NumDocumento").val();
                    var tipo_documento=$('#IdTipoDocumentoIdentidad').val();
                    if(tipo_documento==2){  
                    link="Persona/consultarDni/"+num_documento;
                    if(num_documento.length==8){
                        if(navigator.onLine){
                            buscardocumento(link,tipo_documento);
                            $("#NumeroDocumentoIdentidad").val(num_documento);
                        }else{
                                    $('#envio_search').trigger('reset');
                                    alertify.confirm('Mensaje del Sistema', 'Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos',
                                    function() {
                                        $("#NumeroDocumentoIdentidad").val(num_documento);
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
                            $("#NumeroDocumentoIdentidad").val(num_documento);
                            buscardocumento(link,tipo_documento);
                            }else{
                                $('#envio_search').trigger('reset');
                                alertify.confirm('Mensaje del Sistema', 'Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos',
                                    function() {
                                        $("#NumeroDocumentoIdentidad").val(num_documento);  
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

            //Funcion Buscar Documento

            function buscardocumento(link,tipo_documento){
            $.ajax({
                type: "GET",
                url: link,
                dataType: "JSON",
                success: function(data) {
                    if(data=='no encontrado'){
                        $('#envio_search').trigger('reset');
                        if(navigator.onLine){
                                alertify.confirm('Mensaje del Sistema', 'Numero de Documento no Encontrado, por favor ingrese otro numero o llene los demas campos de manera manual si cree que es correcto',
                                function() {
                                    $('#NumeroDocumentoIdentidad').attr("disabled", false);  
                                },
                                function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
                    
                        }else{
                            alertify.confirm('Mensaje del Sistema', 'Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos',
                                function() {
                                    $('#NumeroDocumentoIdentidad').attr("disabled", false);  
                            },
                            function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
            
                        }
                    }else{
                        if(tipo_documento==2){
                            $('#NombreCompleto').val(data.nombres);
                            $('#ApellidoCompleto').val(data.apellidoPaterno+' '+data.apellidoMaterno);
                            $('#estado_condicion').text('');
                            $("#IdTipoPersona").val(2);
                            
                        }else{
                            console.log(data);
                            $('#RazonSocial').val(data.razonSocial);
                            $('#Direccion').val(data.direccion);
                            $('#NombreComercial').val(data.nombreComercial);
                            $('#EstadoContribuyente').val(data.estado);
                            $('#CondicionContribuyente').val(data.condicion);
                            $('#estado_condicion').text('Estado:'+data.estado+' Condicion:'+data.condicion);
                            var num_documento=$("#NumDocumento").val();
                            var tipo_ruc=num_documento.substring(0,2);
                            
                            switch (tipo_ruc) {
                            case '10': //Persona Natural
                                var dni=num_documento.substring(2,10);
                                buscardni(dni);
                                $('#UbicacionEmpresa').val('-');
                                $("#IdTipoPersona").val(2);
                                break;
                            case '20': //Perspona Juridica
                                alertify.alert('Mensaje del Sistema','El RUC ingresado es posiblemente una empresa, alternativamente puede escribir los datos manualmente o registralo en le modulo persona y luego volver a buscarlo').set('closable', false);
                                $('#estado_condicion').text('');
                                $('#envio_search').trigger('reset');
                                break;
                            default:  //Persona extrangera o  con carnet militar
                                dividirnombre();
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
        

        function buscardni(num_dni){
            $.ajax({
                        type: "GET",
                        url: "Persona/consultarDni/"+num_dni,
                        dataType: "JSON",
                        success: function(data) {
                            if(data=='no encontrado'){
                                dividirnombre();
                            }else{
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


        });
</script>