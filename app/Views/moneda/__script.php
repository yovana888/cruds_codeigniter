<script>        
    $(document).ready(function() {    
        datatable_moneda = $('#datatable_moneda').DataTable({  
	    "ajax":{            
	        "url": "Moneda/mostrarlistadoMoneda", 
	        "method": 'GET', //usamos el metodo POST
	        "dataType": 'json',
	        "dataSrc":""
	    },
	    "columns":[

	        {"data": "IdMoneda"},
	        {"data": "CodigoMoneda"},
	        {"data": "NombreMoneda"},
	        {"data": "SimboloMoneda"},
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
			var IdMoneda = $('#IdMoneda').val();
			if(IdMoneda==""){
				var link = "moneda/registrarMoneda"
			}else{
				var link = "moneda/modificarMoneda";
			}

			addEditRegistro('envio_search',link,luegoInsertarEditarMoneda);
		});

		function luegoInsertarEditarMoneda(){
			$('#modal_moneda').modal('hide');
			$('#envio_search').trigger('reset');
		    datatable_moneda.ajax.reload(null, false);
		}

		$('body').on('click', '.item_edit', function () {
			fila = $(this).closest("tr");	        
        	const id = parseInt(fila.find('td:eq(0)').text());
			$.ajax({
				url: 'moneda/editarMoneda/'+id,
				type: "GET",
				dataType: 'json',            
				success: function (data) {                 
					const moneda = JSON.parse(JSON.stringify(data.data)); 
					console.log(moneda.CodigoMoneda);
					$('#CodigoMoneda').val(moneda.CodigoMoneda);
					$('#NombreMoneda').val(moneda.NombreMoneda);
					$('#SimboloMoneda').val(moneda.SimboloMoneda);
					$("#IdMoneda").val(moneda.IdMoneda);
					$('#modal_moneda').modal('show');
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
                url: "moneda/modificarIndicadorEstado/" +id+"/" + indicador_estado,
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
