<script type="text/javascript">
    $(document).ready(function() {
        datatable_empresa= $('#datatable_empresa').DataTable({
            "ajax": {
                "url": "Empresa/obtenerEmpresa",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdEmpresa"},
                {"data": "CodigoEmpresa"},
                {"data": "RazonSocial"},
                {"data": "RepresentanteLegal"},
                {
                    data: "EstadoEmpresa",
                    render: function(data) {return estado_valor(data, 'btn-estado-2');}
                }
            ]
        });
    });


        $("#envio_empresa").on("submit", function(e) {
            e.preventDefault();
            validation_form('envio_empresa');
            var IdEmpresa = $('#IdEmpresa').val();
            if (IdEmpresa == "") {
                var link = "Empresa/registrarEmpresa";
            } else {
                var link = "Empresa/modificarEmpresa";
            }
            addEditRegistro('envio_empresa',link,luegoInsertarEditarEmpresa);
        });
        
        function luegoInsertarEditarEmpresa(){
            $('#modal_empresa').modal('hide');
            $('#envio_empresa').trigger('reset');
            datatable_empresa.ajax.reload(null, false);
            $('#imgSalida').attr('src','assets/images/empresa/sinlogo.jpg');
        }

        $( "#btn-buscardocumento" ).click(function() {
            var num_documento=$("#CodigoEmpresa").val();
               link="Persona/consultarRuc/"+num_documento;
               if(num_documento.length==11){
                    if(navigator.onLine){
                       buscardocumento(link);
                    }else{
                        alertify.alert('Mensaje del Sistema','Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos').set('closable', false);
                        $('#envio_empresa').trigger('reset');
                    }
               }else{
                   var digitos_faltantes= 11 - num_documento.length;
                   alert('El RUC ingresado debe ser de 11 digitos, le falta '+digitos_faltantes+' digitos')
               }
        });


        function buscardocumento(link){
            $.ajax({
                type: "GET",
                url: link,
                dataType: "JSON",
                success: function(data) {
                    if(data=='no encontrado'){
                        if(navigator.onLine){
                                alertify.confirm('Mensaje del Sistema', 'Numero de Documento no Encontrado, por favor ingrese otro numero o llene los demas campos de manera manual si cree que es correcto',
                                function() {
                                    $('#envio_empresa').trigger('reset');
                                },
                                function() {}).set('labels', {ok:'Llenar Manualmente', cancel:'Cerrar'});
                        }else{
                            alertify.alert('Mensaje del Sistema','Sin Conexion.Comprueba tu Conexion Wi-Fi o de Datos Moviles este activado y vuelve a intentarlo, alternativamente puedes llenar los datos manualmente y lo registraremos en la Base de Datos').set('closable', false);
                        }
                    }else{
                       
                            console.log(data);
                            $('#RazonSocial').val(data.razonSocial);
                            $('#DomicilioFiscal').val(data.direccion);
                            $('#NombreComercial').val(data.nombreComercial);
                        
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
            });
        }

        /*cargar datos*/
        $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Empresa/editarEmpresa/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#IdEmpresa').val(data.IdEmpresa);
                    $('#RazonSocial').val(data.RazonSocial);
                    $('#CodigoEmpresa').val(data.CodigoEmpresa);
                    $('#DomicilioFiscal').val(data.DomicilioFiscal);
                    $('#NombreComercial').val(data.NombreComercial);
                    $('#RepresentanteLegal').val(data.RepresentanteLegal);
                    $('#UsuarioSOL').val(data.UsuarioSOL);
                    $('#ClaveSOL').val(data.ClaveSOL);
                    $('#NombreCertificadoPrincipal').val(data.NombreCertificado);
                    $('#ClavePrivadaCertificadoPrincipal').val(data.ClaveCertificado);
                    $('#FechaInicioCertificadoDigitalPrincipal').val(data.FechaInicioCertificadoDigitalPrincipal	);
                    $('#FechaFinCertificadoDigitalPrincipal').val(data.FechaInicioCertificadoDigitalPrincipal);
                    $('#HostSMTP').val(data.HostSMTP);
                    $('#UsuarioSMTP').val(data.UsuarioSMTP);
                    $('#PuertoSMTP').val(data.PuertoSMTP);
                    $('#ClaveSMTP').val(data.ClaveSMTP);
                    $('#Email').val(data.Email);
                    $('#NombreFoto').val(data.Logo);
                    $('#imgSalida').attr('src','assets/images/empresa/'+data.Logo);
                    $('#modal_empresa').modal('show');
                },
                error: function() {
                    alert("error peticion ajax");
                }
            });
        });
     
       //Para la Foto

       document.getElementById('file-input').onchange = function () {
            $('#imgSalida').empty();
            nombrefoto=document.getElementById('file-input').files[0].name;
            $('#NombreFoto').val(nombrefoto);
            console.log(nombrefoto);
        }
        
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
</script>