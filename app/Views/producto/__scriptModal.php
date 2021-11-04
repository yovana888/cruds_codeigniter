<script>
    $(document).ready(function() {
        $('#div-tipoactivo').hide();
        $('#div-tiposervicio').hide();

        //Funcion para tipoServicio y tipoActivo
        $('select#IdCategoriaProducto').on('change', function() {
            idc = $('#IdCategoriaProducto').val();
            if (idc == '2') {
                $('#div-tiposervicio').show();
                $('#div-tipoactivo').hide();
                document.getElementById('rb-servicio').checked = true;
                document.getElementById('rb-bien').checked = false;
                $('[name="IdTipoProducto"]').val(2)

            } else if (idc == '5') {
                $('#div-tipoactivo').show();
                $('#div-tiposervicio').hide();
                document.getElementById('rb-servicio').checked = false;
                document.getElementById('rb-bien').checked = true;
                $('[name="IdTipoProducto"]').val(1);
            } else {
                $('#div-tipoactivo').hide();
                $('#div-tiposervicio').hide();
                document.getElementById('rb-servicio').checked = false;
                document.getElementById('rb-bien').checked = true;
                $('[name="IdTipoProducto"]').val(1);
            }
        });

        $('select#Select-IdFamiliaProducto').on('change', function() {
            cargarSubFamilias();
        });

        $('select#Select-IdMarca').on('change', function() {
            cargarModelos();
        });
        //Funcion para recargar SubFamilias 

        function cargarSubFamilias(idf) {
            datosFamilia = document.getElementById('Select-IdFamiliaProducto').value.split('_');
            id=datosFamilia[0]; // en el [0] esta el id, [1] esta iniciales nombre,[2] iniciales codigo
            $('#IdFamiliaProducto').val(id);

            $('select#IdSubFamiliaProducto').empty();
            $.ajax({
                type: "GET",
                url: "Producto/obtenerSubFamiliaProducto/"+id,
                dataType: "JSON",
                beforeSend: function() {
                    $('#IdSubFamiliaProducto').prop('disabled', true);
                },
                success: function(data) {
                    $('#IdSubFamiliaProducto').prop('disabled', false);
                    $(data).each(function(i, v) { // indice, valor
                        $('select#IdSubFamiliaProducto').append('<option value="' + v.IdSubFamiliaProducto + '">' + v.NombreSubFamiliaProducto + '</option>')
                    });

                    if(idf!=null){ 
                    console.log('valor de subfamilia:'+idf)
                    $("#IdSubFamiliaProducto").val(idf);  //para cargar el valor al editar, idf=IdFamilia
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }

            });
            

            var correlativo = $('select#correlativo').val(); //encaso de cambio de la familia o marca y genere el codigo
            if(correlativo != '' ){
                generarCodigo(correlativo);
            }
            
        }

        //Funcion para recargar Marca Modelo
        function cargarModelos(idm) {
            datosMarca = document.getElementById('Select-IdMarca').value.split('_');
            id=datosMarca[0]; // en el [0] esta el id, [1] esta iniciales nombre,[2] iniciales codigo
            $('#IdMarca').val(id); 
             
            $('select#IdModeloMarca').empty();
            $.ajax({
                type: "GET",
                url: "Producto/obtenerModeloMarca/" + id,
                dataType: "JSON",
                beforeSend: function() {
                    $('#IdModeloMarca').prop('disabled', true);
                },
                success: function(data) {
                    $('#IdModeloMarca').prop('disabled', false);
                    $(data).each(function(i, v) { // indice, valor
                        $('select#IdModeloMarca').append('<option value="' + v.IdModeloMarca + '">' + v.NombreModeloMarca + '</option>')
                    });
                    if(idm!=null){ 
                        console.log('valor de modelo:'+idm)
                        $("#IdModeloMarca").val(idm);  //para cargar el valor al editar, idm=IdMarca
                    }
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
            });


            var correlativo = $('select#correlativo').val();
            if(correlativo != '' ){
                generarCodigo(correlativo);
            }
        }


        //Seccion para generar codigo producto
        $('select#correlativo').on('change', function() {
            var correlativo = $('select#correlativo').val();
            if(correlativo != ''){
                generarCodigo(correlativo);
            }else{
                $('#CodigoProducto').val('');
            }

        });

        function generarCodigo(correlativo) {
            switch (correlativo) {
                case 'marca':
                    datosMarca = document.getElementById('Select-IdMarca').value.split('_');
                    iniciales_marca=datosMarca[2]; // [2] iniciales para codigo
                    idMarca = $('#IdMarca').val(); 

                    if(idMarca!=0){
                        var link = "Producto/generarCodigoMarca/"+iniciales_marca;
                    }else{
                        alert('Para autogenerar por MARCA, este debe ser diferente a NO ESPECIFICO o Autogenere por Numerico');
                        $('#CodigoProducto').val('');
                    }
                    break;
                case 'familia':
                    datosFamilia = document.getElementById('Select-IdFamiliaProducto').value.split('_');
                    iniciales_familia=datosFamilia[2];  // [2] iniciales para codigo
                    idFamilia   = $('#IdFamiliaProducto').val();

                    if(idFamilia!=0){
                        var link = "Producto/generarCodigoFamilia/"+iniciales_familia;
                    }else{
                        alert('Para autogenerar por FAMILIA, este debe ser diferente a NO ESPECIFICO o Autogenere por Numerico');
                        $('#CodigoProducto').val('');
                    }
                    break;
                case 'numerico':
                    var link = "Producto/generarCodigoNumerico";

            }
            $.ajax({
                type: "GET",
                url: link,
                dataType: "JSON",
                success: function(data) {
                   $('#CodigoProducto').val(data);
                   console.log(data);
                },
                error: function(jqXHR) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Al parecer hubo un error');
                }
            });
        }


      //Seccion de Autocompletar Nombre Producto

      $('#Check1').change(function() {
        if(this.checked) {
            add_iniciales('familia');
        }else{
            remove_iniciales('familia');
        }    
      });
      
      $('#Check2').change(function() {
        if(this.checked) {
            add_iniciales('subfamilia');
        }else{
            remove_iniciales('subfamilia');
        }    
      });

      $('#Check3').change(function() {
        if(this.checked) {
            add_iniciales('marca');
        }else{
            remove_iniciales('marca');
        }    
      });

      $('#Check4').change(function() {
        if(this.checked) {
            add_iniciales('modelo');
        }else{
            remove_iniciales('modelo');
        }    
      });

      //Autocompletar con codigo original
      $('#Check5').change(function() { 
        if(this.checked) {
           codigo_original=$('#CodigoProducto').val();
           $('#CodigoComercialProducto').val(codigo_original);
        }   
      });
       //Autocompletar con nombre original
      $('#Check6').change(function() {
        if(this.checked) {
            nombre_original=$('#NombreProducto').val();
            $('#NombreComercialProducto').val(nombre_original);
        } 
      });


       function add_iniciales(valor_checked){
            id1=$('#IdFamiliaProducto').val();
            id2=$('#IdMarca').val();
            id3=$('#IdModeloMarca').val();
            id4=$('#IdSubFamiliaProducto').val()
            
                switch (valor_checked) {
                case 'marca':
                    if(id2==0){
                        $('#input_Check3').val('');
                    }else{
                       datosMarca = document.getElementById('Select-IdMarca').value.split('_');
                       iniciales_marca=datosMarca[1]; // [1] iniciales para nombre
                       $('#input_Check3').val(iniciales_marca);
                    } //fin else
                  
                    break;
                case 'familia':
                    if(id1==0){
                        $('#input_Check1').val('');
                    }else{
                        datosFamilia = document.getElementById('Select-IdFamiliaProducto').value.split('_');
                        iniciales_familia=datosFamilia[1];  // [1] iniciales para nombre
                        $('#input_Check1').val(iniciales_familia);
                    } //fin else

                    break;

                case 'subfamilia':
                    if(id4==0){
                        $('#input_Check2').val('');
                    }else{
                        iniciales_subfamilia=$('select[name="IdSubFamiliaProducto"] option:selected').text();
                        $('#input_Check2').val(iniciales_subfamilia);
                    }
                    break;
                case 'modelo':

                    if(id3==0){
                        $('#input_Check4').val('');
                    }else{
                        iniciales_modelo=$('select[name="IdModeloMarca"] option:selected').text();
                        $('#input_Check4').val(iniciales_modelo);
                    }
                
                    break;
                }//fin switch
           
              iniciales_familia=$('#input_Check1').val();
              iniciales_subfamilia=$('#input_Check2').val();
              iniciales_marca=$('#input_Check3').val();
              iniciales_modelo=$('#input_Check4').val();
              nombre_producto= iniciales_familia + " " + iniciales_subfamilia + " " + iniciales_marca + " " + iniciales_modelo;
              $('#NombreProducto').val(nombre_producto);
       }//fin add_iniciales



       function  remove_iniciales(valor_checked){
          switch (valor_checked){
              case 'marca':
                 $('#input_Check3').val('');
               break;
              case 'familia':
                $('#input_Check1').val('');
                  break;
              case 'subfamilia':
                $('#input_Check2').val('');
                  break;
              case 'modelo':
                $('#input_Check4').val('');
                break;
          }

              iniciales_familia=$('#input_Check1').val();
              iniciales_subfamilia=$('#input_Check2').val();
              iniciales_marca=$('#input_Check3').val();
              iniciales_modelo=$('#input_Check4').val();
              nombre_producto= iniciales_familia + " " + iniciales_subfamilia + " " + iniciales_marca + " " + iniciales_modelo;
              $('#NombreProducto').val(nombre_producto);
       } // fin remove_iniciales
    
       //Autogenerar Codigo de Barras en base al select
       $('select#correlativo2').change(function() {
        var codigo_barras = $('select#correlativo2').val();
            switch (codigo_barras){
                case '':
                    $('#CodigoBarraProducto').val('');
                break;
                case 'codigo_producto':
                    codigo_original=$('#CodigoProducto').val();
                    $('#CodigoBarraProducto').val(codigo_original);
                    break;
                case 'fecha_hora':
                    var hoy = new Date();
                    var fecha = hoy.getDate() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getFullYear();
                    var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
                    var fechaYHora = fecha + ' ' + hora; //Obteniendo una variable con la máscara d-m-Y H:i:s
                    $('#CodigoBarraProducto').val(fechaYHora);
                    break;
               
            }
       });
      
        //Funcion cargar Datos
       $('body').on('click', '.item_edit', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Producto/editarProducto/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $("#IdProducto").val(data[0].IdProducto);
                    $("#IdFamiliaProducto").val(data[0].IdFamiliaProducto);
                    $("select#Select-IdFamiliaProducto").val(data[0].IdFamiliaProducto+"_"+data[0].InicialesFamiliaNombreProducto+"_"+data[0].InicialesFamiliaCodigoNombreProducto);
                    var idf = data[0].IdSubFamiliaProducto;
                    cargarSubFamilias(idf); 
                    $("#IdMarca").val(data[0].IdMarca);
                    $("select#Select-IdMarca").val(data[0].IdMarca+"_"+data[0].InicialesMarcaNombreProducto+"_"+data[0].InicialesMarcaCodigoProducto);
                    var idm = data[0].IdModeloMarca;
                    cargarModelos(idm);
                    $("#CodigoProducto").val(data[0].CodigoProducto);
                    $("#NombreProducto").val(data[0].NombreProducto);
                    $("#CodigoComercialProducto").val(data[0].CodigoComercialProducto);
                    $("#NombreComercialProducto").val(data[0].NombreComercialProducto);
                    $("#NombreComercialProducto").val(data[0].NombreComercialProducto);
                    $("select#IdLineaProducto").val(data[0].IdLineaProducto);
                    $("select#IdFabricante").val(data[0].IdFabricante);
                    $("select#IdCategoriaProducto").val(data[0].IdCategoriaProducto);
                    $("select#IdTipoServicio").val(data[0].IdTipoServicio); 
                    $("select#IdTipoActivo").val(data[0].IdTipoActivo);
                    $('[name="IdTipoProducto"]').val(data[0].IdTipoProducto);
                    $("select#IdTipoExistencia").val(data[0].IdTipoExistencia);
                    $("#OtroDato").val(data[0].OtroDato);
                    $("#CodigoBarraProducto").val(data[0].CodigoBarraProducto);
                    $('#NombreFoto').val(data[0].Foto);
                    $('#imgSalida').attr('src','assets/images/productos/'+data[0].Foto);
                    $('#modal_producto').modal('show');
                    
                },
                error: function() {
                    alert("error peticion ajax");
                }
            });
        });

        document.getElementById('file-input').onchange = function () {
            $('#imgSalida').empty();
            nombrefoto=document.getElementById('file-input').files[0].name;
            $('#NombreFoto').val(nombrefoto);
            console.log(nombrefoto);
        }    
      
    });
</script>