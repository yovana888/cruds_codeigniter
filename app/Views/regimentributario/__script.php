<script>

    $(document).ready(function() {    
        datatable_moneda = $('#datatable_regimentributario').DataTable({  
	    "ajax":{            
	        "url": "RegimenTributario/mostrarListadoRegimenTributario", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[ 

	        {"data": "IdRegimenTributario"},
	        {"data": "NombreAbreviado"},
	        {"data": "NombreRegimenTributario"},	        
	        {"data": "FechaRegistro"},
	        {"data": "UsuarioRegistro"},
	        {"data": "FechaModificacion"},
	        {"data": "UsuarioModificacion"},
	        //{"defaultContent": "<input type='checkbox'  class='checkid form-check-input'  value='' >","data": "AtajoModulo"},
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
			var IdRegimenTributario = $('#IdRegimenTributario').val();

			if(IdRegimenTributario==""){
				var link = "RegimenTributario/registrarRegimenTributario"
			}else{
				var link = "RegimenTributario/modificarRegimenTributario";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarRegimenTributario);
		});

		function luegoInsertarEditarRegimenTributario(){
			$('#modal_regimentributario').modal('hide');
			$('#envio_search').trigger('reset');
		    datatable_moneda.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'RegimenTributario/editarRegimenTributario/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const moneda = JSON.parse(JSON.stringify(data.data)); 
					console.log(moneda.NombreAbreviado);
					$('#NombreAbreviado').val(moneda.NombreAbreviado);
					$('#NombreRegimenTributario').val(moneda.NombreRegimenTributario);
					$("#IdRegimenTributario").val(moneda.IdRegimenTributario);				
					$('#modal_regimentributario').modal('show');
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
                url: "RegimenTributario/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_moneda.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }	 

		  
	});
        
             
</script>