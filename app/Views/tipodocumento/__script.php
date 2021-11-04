<script>

    $(document).ready(function() {    
        datatable_tipodocumento = $('#datatable_tipodocumento').DataTable({  
	    "ajax":{            
	        "url": "TipoDocumento/mostrarListadoTipoDocumentos", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[  
	        {"data": "IdTipoDocumento"},
			{"data": "CodigoTipoDocumento"},
	        {"data": "NombreAbreviado"},
	        {"data": "NombreTipoDocumento"},	        
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
			var IdTipoDocumento = $('#IdTipoDocumento').val();

			if(IdTipoDocumento==""){
				var link = "TipoDocumento/registrarTipoDocumento"
			}else{
				var link = "TipoDocumento/modificarTipoDocumento";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarTipoDocumento);
		});

		function luegoInsertarEditarTipoDocumento(){
			$('#modal_tipodocumento').modal('hide');
			$('#envio_search').trigger('reset');
			datatable_tipodocumento.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'TipoDocumento/editarTipoDocumento/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const tipodocumento = JSON.parse(JSON.stringify(data.data)); 
					console.log(tipodocumento.NombreAbreviado);
					$('#NombreAbreviado').val(tipodocumento.NombreAbreviado);
					$('#NombreTipoDocumento').val(tipodocumento.NombreTipoDocumento);
					$('#CodigoTipoDocumento').val(tipodocumento.CodigoTipoDocumento);
					$("#IdTipoDocumento").val(tipodocumento.IdTipoDocumento);				
					$('#modal_tipodocumento').modal('show');
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
                url: "TipoDocumento/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_tipodocumento.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

	});
        

</script>

    