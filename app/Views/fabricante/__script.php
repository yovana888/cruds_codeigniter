<script>        
    $(document).ready(function(){    
        datatable_fabricante = $('#datatable_fabricante').DataTable({  
	    "ajax":{            
	        "url": "Fabricante/mostrarListadoFabricante", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[

	        {"data": "IdFabricante"},
	        {"data": "NombreFabricante"},
			{"data": "FechaRegistro"},
            {"data": "UsuarioRegistro"},	         
	        {
              	data: "EstadoFabricante",
             	render: function(data) {return estado_valor(data, 'span-estado');}
            },
            {
                data: "EstadoFabricante",
                render: function(data) {return estado_valor(data, 'btn-estado');}
            }	         
	    ]
	    }); 

		$("#envio_search").on("submit", function(e){

			e.preventDefault();
			var IdMoneda = $('#IdFabricante').val();

			if(IdMoneda==""){
				var link = "Fabricante/registrarFabricante"
			}else{
				var link = "Fabricante/modificarFabricante";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarFabricante);
		});

		function luegoInsertarEditarFabricante(){
			$('#modal_fabricante').modal('hide');
			$('#envio_search').trigger('reset');
			datatable_fabricante.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'Fabricante/editarFabricante/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const fabricante = JSON.parse(JSON.stringify(data.data));					 
					$('#NombreFabricante').val(fabricante.NombreFabricante);					 
					$("#IdFabricante").val(fabricante.IdFabricante);
					$('#modal_fabricante').modal('show');
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
                url: "Fabricante/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_fabricante.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }

		 
	});
</script>