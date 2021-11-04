<script>

    $(document).ready(function() {    
        datatable_tipodocumentoidentidad = $('#datatable_tipodocumentoidentidad').DataTable({  
	    "ajax":{            
	        "url": "TipoDocumentoIdentidad/mostrarListadoTipoDocumentoIdentidad", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[  
	        {"data": "IdTipoDocumentoIdentidad"},
			{"data": "CodigoDocumentoIdentidad"},
	        {"data": "NombreAbreviado"},
	        {"data": "NombreTipoDocumentoIdentidad"},	        
	        {"data": "FechaRegistro"},
	        {"data": "UsuarioRegistro"},
	      
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
			var IdTipoDocumentoIdentidad = $('#IdTipoDocumentoIdentidad').val();

			if(IdTipoDocumentoIdentidad==""){
				var link = "TipoDocumentoIdentidad/registrarTipoDocumentoIdentidad"
			}else{
				var link = "TipoDocumentoIdentidad/modificarTipoDocumentoIdentidad";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarTipoDocumentoIdentidad);
		});

		function luegoInsertarEditarTipoDocumentoIdentidad(){
			$('#modal_tipodocumentoidentidad').modal('hide');
			$('#envio_search').trigger('reset');
			datatable_tipodocumentoidentidad.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'TipoDocumentoIdentidad/editarTipoDocumentoIdentidad/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const tipodocumento = JSON.parse(JSON.stringify(data.data)); 
					 
					$('#NombreAbreviado').val(tipodocumento.NombreAbreviado);
					$('#NombreTipoDocumentoIdentidad').val(tipodocumento.NombreTipoDocumentoIdentidad);
					$('#CodigoDocumentoIdentidad').val(tipodocumento.CodigoDocumentoIdentidad);
					$("#IdTipoDocumentoIdentidad").val(tipodocumento.IdTipoDocumentoIdentidad);				
					$('#modal_tipodocumentoidentidad').modal('show');
				},
				error: function () {
					alert("error peticion ajax");
				}
			});
		});		 

		$('body').on('click', '.item_delete', function() {
            fila = $(this).closest("tr");
            const id = parseInt(fila.find('td:eq(0)').text());
            var indicador_estado = '0';
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
            var indicador_estado = '1';
            alertify.confirm('Ventana Restaurar', 'Esta seguro de restaurar el registro ' + id + '?',

                function() {
                    modificarIndicadorEstado(id, indicador_estado);
                },
                function() {});
        });

        function modificarIndicadorEstado(id, indicador_estado) {
            $.ajax({
                type: "POST",
                url: "TipoDocumentoIdentidad/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_tipodocumentoidentidad.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        } 
	});
        

</script>