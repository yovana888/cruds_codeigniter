<script type="text/javascript">
$(document).ready(function() {
     
    datatable_distrito = $('#datatable_distrito').DataTable({  
	    "ajax":{            
	        "url": "Distrito/obtenerDistritos", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[

	        {"data": "IdDistrito"},
	        {"data": "CodigoUbigeoDistrito"},
	        {"data": "NombreDistrito"},
	        {"data": "NombreProvincia"},
	        {"data": "NombreDepartamento"},	        
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
                var IdDepartamento = $('#IdDistrito').val();
                if(IdDepartamento==""){
                    var link = "distrito/registrarDistrito"
                }else{
                    var link = "distrito/modificarDistrito";
                }
                addEditRegistro('envio_search',link,luegoInsertarEditarDistrito);
    });

    function luegoInsertarEditarDistrito(){
        $('#envio_search').trigger('reset');
        $('#modal_distrito').modal('hide');
        $('select#IdProvincia').empty();
        datatable_distrito.ajax.reload(null, false);
    }

   //Para cargar Provincias
    $('select#IdDepartamento').on('change', function() {
        cargarprovincias();
    });
 
    function cargarprovincias(idp){
        var id = $('select#IdDepartamento').val();
        $('select#IdProvincia').empty();
        $.ajax({
            type: "GET",
            url: "Distrito/obtenerProvincias/"+id,
            dataType: "JSON",
            beforeSend: function ()
                {
                    $('#IdProvincia').prop('disabled', true);
                },
            success: function(data) {
                    $('#IdProvincia').prop('disabled', false);
                    $(data).each(function(i, v){ // indice, valor
                    $('select#IdProvincia').append('<option value="' + v.IdProvincia + '">' + v.NombreProvincia + '</option>') });
                    if(idp!=null){
                        $("select#IdProvincia").val(idp);
                    }else{
                        siguienteCodigoUbigeo();
                    }
            },
            error: function(jqXHR) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Al parecer hubo un error');
            }
        });
    }

    //Para siguiente codigo ubigeo
    $('select#IdProvincia').on('change', function() {
       siguienteCodigoUbigeo();
    });

    function siguienteCodigoUbigeo(){
       id= $('select#IdProvincia').val();
       console.log('su id'+id);
       $.ajax({
            type: "GET",
            url: "Distrito/obtenerSiguienteCodigoUbigeo/"+id,
            dataType: "JSON",
            success: function(data) {
                console.log('aqui'+data);
                $('[name="CodigoUbigeoDistrito"]').val(data);
            },
            error: function(jqXHR) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Al parecer hubo un error');
            }
        });
    }

    //cargar datos
    $('body').on('click', '.item_edit', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'Distrito/editarDistrito/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                $('#NombreDistrito').val(data[0].NombreDistrito);
                $('#CodigoUbigeoDistrito').val(data[0].CodigoUbigeoDistrito);
                $("#IdDepartamento").val(data[0].IdDepartamento);
                $("#IdProvincia").val(data[0].IdProvincia);
                $("#IdDistrito").val(data[0].IdDistrito);
                var id=data[0].IdDepartamento;
                var idp=data[0].IdProvincia;
                cargarprovincias(idp);
                $('#modal_distrito').modal('show');
            },
            error: function () {
                alert("error peticion ajax");
            }
        });
    }); 
    

       //eliminar
        $('body').on('click', '.item_delete', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var indicador_estado ='I';
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
            var indicador_estado ='A';
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "Distrito/modificarIndicadorEstado/" +id+ "/" +indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_distrito.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

        $( "#pdf").click(function() {
            var tipo='pdf';
            window.open('Distrito/generarReporte/'+tipo); //generar
        });

        $( "#xlsx").click(function() {
            var tipo='xlsx';
            window.open('Distrito/generarReporte/'+tipo);
        });


});

</script>