<script>        
    $(document).ready(function(){    
        datatable_lineaproducto = $('#datatable_lineaproducto').DataTable({  
	    "ajax":{            
	        "url": "LineaProducto/mostrarListadoLineaProducto", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[

	        {"data": "IdLineaProducto"},
	        {"data": "NombreLineaProducto"},
			{"data": "FechaRegistro"},
            {"data": "UsuarioRegistro"},	         
	        {
              	data: "EstadoLineaProducto",
             	render: function(data) {return estado_valor(data, 'span-estado');}
            },
            {
                data: "EstadoLineaProducto",
                render: function(data) {return estado_valor(data, 'btn-estado');}
            }	         
	    ]
	    }); 

		$("#envio_search").on("submit", function(e){
			e.preventDefault();
			var IdMoneda = $('#IdLineaProducto').val();
			if(IdMoneda==""){
				var link = "LineaProducto/registrarLineaProducto"
			}else{
				var link = "LineaProducto/modificarLineaProducto";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarLineaProducto);
		});

		function luegoInsertarEditarLineaProducto(){
			$('#modal_lineaproducto').modal('hide');
			$('#envio_search').trigger('reset');
			datatable_lineaproducto.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
        	console.log(id);
			$.ajax({
				url: 'LineaProducto/editarLineaProducto/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const lineaproducto = JSON.parse(JSON.stringify(data.data));					 
					$('#NombreLineaProducto').val(lineaproducto.NombreLineaProducto);					 
					$("#IdLineaProducto").val(lineaproducto.IdLineaProducto);
					$('#modal_lineaproducto').modal('show');
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
                url: "LineaProducto/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_lineaproducto.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

		 
	});
</script>