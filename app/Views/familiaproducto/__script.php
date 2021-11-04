<script>        
    $(document).ready(function(){    
        datatable_familiaproducto = $('#datatable_familiaproducto').DataTable({  
	    "ajax":{            
	        "url": "FamiliaProducto/mostrarListadoFamiliaProducto", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[

	        {"data": "IdFamiliaProducto"},
	        {"data": "NombreFamiliaProducto"},
	        {"data": "InicialesFamiliaNombreProducto"},
	        {"data": "InicialesFamiliaCodigoNombreProducto"},
			{"data": "FechaRegistro"},
            {"data": "UsuarioRegistro"},	         
	        {
              	data: "EstadoFamiliaProducto",
             	render: function(data) {return estado_valor(data, 'span-estado');}
            },
            {
                data: "EstadoFamiliaProducto",
                render: function(data) {return estado_valor(data, 'btn-estado');}
            }	
	    ]
	    }); 

		$("#envio_search").on("submit", function(e){

			e.preventDefault();
			var IdMoneda = $('#IdFamiliaProducto').val();

			if(IdMoneda==""){
				var link = "FamiliaProducto/registrarFamiliaProducto"
			}else{
				var link = "FamiliaProducto/modificarFamiliaProducto";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarFamiliaProducto);
		});

		function luegoInsertarEditarFamiliaProducto(){
			$('#modal_familiaproducto').modal('hide');
			$('#envio_search').trigger('reset');
			datatable_familiaproducto.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'FamiliaProducto/editarFamiliaProducto/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const familiaproducto = JSON.parse(JSON.stringify(data.data));					 
					$('#NombreFamiliaProducto').val(familiaproducto.NombreFamiliaProducto);
					$("#InicialesFamiliaNombreProducto").val(familiaproducto.InicialesFamiliaNombreProducto);	
					$("#InicialesFamiliaCodigoNombreProducto").val(familiaproducto.InicialesFamiliaCodigoNombreProducto);				 
					$("#IdFamiliaProducto").val(familiaproducto.IdFamiliaProducto);
					$('#modal_familiaproducto').modal('show');
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
                url: "FamiliaProducto/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_familiaproducto.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }
	});
</script>