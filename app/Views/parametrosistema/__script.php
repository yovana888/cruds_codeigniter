<script type="text/javascript">
$(document).ready(function() {
    /*cargar_tabla();

    function cargar_tabla() {
        $.ajax({
            type: 'GET',
            url: 'ParametroSistema/obtenerParametroSistema',
            async: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                const n = data.length;
                var html = '';
                var i;
                var span;

                for (i = 0; i < n; i++) {
                    var estado = data[i].IndicadorEstado;
                    if (estado == 'A') {
                        span = 'checked'
                    } else {
                        span = ''
                    }

                    html += '<tr data-padre="' + data[i].IdParametroSistema + '">' +
                            '<td>' + data[i].IdParametroSistema + '</td>' +
                            '<td>' + data[i].NombreParametroSistema + '</td>' +
                            '<td>' + data[i].ValorParametroSistema + '</td>' +
                            '<td>' + data[i].NombreGrupoParametro + '</td>' +
                            '<td>' + data[i].UsuarioModificacion + '</td>' +
                            '<td>' + data[i].FechaModificacion + '</td>' +                            
                            '<td> <input type="checkbox"  class="checkid form-check-input" '+span+' value="'+estado +'" ></td>' +
                            '<td>' +
                            '<button class="btn btn-primary btn-sm item_edit" data-id="' + data[i]
                            .IdParametroSistema + '"><i class="fa fa-edit"></i></button>'+
                            '</td>' +
                            '</tr>';
                }

                $('#mostrartabla').html(html);

                $('#datatableparametrosistema').DataTable({
                      "destroy": true, //use for reinitialize datatable
                });


            },
            error: function(data, jqXHR, textStatus) {
                console.log('ERROR');
            }

        });
    }
    */
    datatableparametrosistema = $('#datatableparametrosistema').DataTable({  
    "ajax":{            
        "url": "ParametroSistema/obtenerParametroSistema", 
        "method": 'GET', //usamos el metodo POST
        "dataType": 'json',
        "dataSrc":""
    },
    "columns":[
        {"data": "IdParametroSistema"},
        {"data": "NombreParametroSistema"},
        {"data": "ValorParametroSistema"},
        {"data": "NombreGrupoParametro"},
        {"data": "UsuarioModificacion"},
        {"data": "FechaModificacion"},
         
        //{"defaultContent": "<input type='checkbox'  class='checkid form-check-input'  value='' >","data": "AtajoModulo"},
        {       data:   "IndicadorEstado",
                render: function ( data, type, row ) {
                    if ( type === 'display' ) {
                        if( data === "A"){
                            return '<input type="checkbox" value="A" class="checkid editor-active" checked>';
                        }else{
                            return '<input type="checkbox" value="I" class="checkid editor-active">';
                        }
                    }
                    return data;
                },
                className: "dt-body-center"
        },
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm item_edit'> Editar </button> </div></div>"}
    ]
    });  

    $("#formparametrosistema").on("submit", function(e){

        e.preventDefault();
        var IdGrupoParametro = $('#IdParametroSistema').val();
        if(IdGrupoParametro==""){
            var link = "parametrosistema/registrarParametroSistema"
        }else{
            var link = "parametrosistema/modificarParametroSistema";
        }
        addEditRegistro('envio_search',link,luegoInsertarEditarParametroSistema);
              
    });

    function luegoInsertarEditarParametroSistema(){
        $('#formparametrosistema').trigger('reset');
        $('#modalparametrosistema').modal('hide');
        datatableparametrosistema.ajax.reload(null, false);
    }

    /*La funcion para hacer reset del formulario esta en el mismo boton*/
    $('body').on('click', '.item_edit', function () {
        /*const id = $(this).attr('data-id');
        console.log(id);*/
        fila = $(this).closest("tr");	        
        const id = parseInt(fila.find('td:eq(0)').text());
        $.ajax({
            url: 'ParametroSistema/editarParametroSistema/'+id,
            type: "GET",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                const datos = JSON.parse(JSON.stringify(data.data));
                console.log(datos);
                $('#IdParametroSistema').val(datos.IdParametroSistema);
                $('#NombreParametroSistema').val(datos.NombreParametroSistema);
                $('#ValorParametroSistema').val(datos.ValorParametroSistema); 
                $("#IdGrupoParametro").val(datos.IdGrupoParametro).selectpicker("refresh");                 
                $('#modalparametrosistema').modal('show');
            },
            error: function () {
                alertify.error("Error al solicitar los datos");
            }
        });
    });

    $(document).on('click','.checkid', function(){
                const element = $(this)[0].parentElement.parentElement;
                const checkid = $(element).attr('data-padre');
                const valor = $(this).val();

                $.ajax({
                    /*METODO GET, SIN EMBARGO PARA HACER POR EL METODO POST ES NECESARIO USAR FORMDATA*/
                    type: "GET",
                    url:  'ParametroSistema/modificarIndicadorEstado',
                    data: 'id='+checkid+'&estado='+valor,
                    beforeSend: function(){
                        //imagen de carga
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(){
                        alertify.error("error peticion ajax");
                    },
                    success: function(data){
                        alertify.success("Modificado correctamente");
                        /*$("#datatableparametrosistema").dataTable().fnDestroy();
                        cargar_tabla();
                        $('#datatableparametrosistema').dataTable();*/
                        datatableparametrosistema.ajax.reload(null, false);
                    }
                })
         });

});

</script>