<script>        
    $(document).ready(function(){    
        datatable_subfamiliaproducto = $('#datatable_subfamiliaproducto').DataTable({  
	    "ajax":{            
	        "url": "SubFamiliaProducto/mostrarListadoSubFamiliaProducto", 
	        "method": 'GET', 
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[
	        {"data": "IdSubFamiliaProducto"},
	        {"data": "NombreSubFamiliaProducto"},
	        {"data": "NombreFamiliaProducto"},	                
	        {
              	data: "EstadoSubFamiliaProducto",
             	render: function(data) {return estado_valor(data, 'span-estado');}
            },
            {
                data: "EstadoSubFamiliaProducto",
                render: function(data) {return estado_valor(data, 'btn-estado');}
            }	
	    ]
	    }); 

		$("#envio_search").on("submit", function(e){

			e.preventDefault();
			var IdMoneda = $('#IdFamiliaProducto').val();

			if(IdMoneda==""){
				var link = "SubFamiliaProducto/registrarSubFamiliaProducto"
			}else{
				var link = "SubFamiliaProducto/modificarSubFamiliaProducto";
			}
			addEditRegistro('envio_search',link,luegoInsertarEditarSubFamiliaProducto);
			
		});

		function luegoInsertarEditarSubFamiliaProducto(){
			$('#modal_subfamiliaproducto').modal('hide');
			$('#envio_search').trigger('reset');
			datatable_subfamiliaproducto.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'SubFamiliaProducto/editarSubFamiliaProducto/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const subfamiliaproducto = JSON.parse(JSON.stringify(data.data));					 
					$('#NombreSubFamiliaProducto').val(subfamiliaproducto.NombreSubFamiliaProducto);
					$("#IdFamiliaProducto").val(subfamiliaproducto.IdFamiliaProducto); 			 
					$("#IdSubFamiliaProducto").val(subfamiliaproducto.IdSubFamiliaProducto);
					$('#modal_subfamiliaproducto').modal('show');
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
                url: "SubFamiliaProducto/modificarIndicadorEstado/" +id+"/" + indicador_estado,
                dataType: "JSON",
                success: function(data) {
                    datatable_subfamiliaproducto.ajax.reload(null, false);
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success('El Estado del Registro se Modifico Correctamente');
                }
            });
        }
	});
</script>