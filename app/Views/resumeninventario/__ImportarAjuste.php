<div class="modal fade" id="modal_importar_ajuste" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered mb-5" role="document">
        <div class="modal-content">
            <form id="envio_importar_ajuste">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Importar Ajuste Inventario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                           <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Seleccione Familia<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                       <select name="IdFamilia" id="IdFamilia"  class="form-control-sm custom-select">
                                       <?php foreach ($familia as $row) : ?>
                                            <option value="<?php echo $row->IdFamiliaProducto; ?>"><?php echo $row->NombreFamiliaProducto; ?></option>
                                        <?php endforeach; ?>
                                       </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Seleccione Sede<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="IdSedeExportar" class="form-control-sm custom-select" id="IdSedeExportar"> 
                                            <?php foreach ($sede as $row) : ?>
                                              <option value="<?php echo $row->IdSede; ?>"><?php echo $row->NombreSede; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Formato Excel<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="#" id="enlace_descarga_ajuste">Descargar Formato Ajuste</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Fecha Inventario<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="date" name="FechaInventario" class="form-control input-sm input-h"
                                            required>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Subir Archivo<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="file" class="form-control-file" id="archivo_excel_ajuste" name="archivo_excel_ajuste" required accept=".xls,.xlsx">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Observacion</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control input-sm input-h" id="ObservacionAjuste" name="Observacion">
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-muted mb-1 lt">Intrucciones<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-11">
                                        <ul>
                                            <li class="text-muted lt">Recuerde Seleccionar una familia y una Sede para descargar el Formato, caso contrario solo descargara los productos de familia no especificado</li>
                                            <li class="text-muted lt">Si dentro del formato hay productos que no desee inventariar solo elimine la Fila</li>
                                            <li class="text-muted lt">No agregue columnas adicionales en el Formato</li>
                                            <li class="text-muted lt">Asi mismo no elimine ninguna columna</li>
                                            <li class="text-muted lt">Si un Producto no aparece en el formato, puede ser que este inactivo o no tenga un inventario inicial.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 ml-4 mt-3" id='div-error-ajuste'>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="alert alert-warning" role="alert" >
                                            <strong>Advertencia!</strong>
                                            <p class="lt" style='color:#000;' id='text-error-ajuste'></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn-line btn btn-sm" style="margin-left:80%;"
                        id="importar_excel_ajuste">Procesar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
//Descarga Formato
$("#enlace_descarga_ajuste").click(function() {
    var id_sede=$('#IdSedeExportar').val();
    var id_familia=$('#IdFamilia').val();
    var nombre_familia = $('select[name="IdFamilia"] option:selected').text();
    var nombre_sede = $('select[name="IdSedeExportar"] option:selected').text();
    window.open("ResumenInventario/exportarExcelAjuste/"+id_sede+"/"+id_familia+"/"+nombre_sede+"/"+nombre_familia); 

});



$("#envio_importar_ajuste").on("submit", function(e) {
    e.preventDefault();
    var data = new FormData(document.getElementById('envio_importar_ajuste'));
    $.ajax({
        type: 'POST',
        url: "ResumenInventario/importarAjusteInventario",
        data: data,
        processData: false,
        contentType: false,
        async: false,
        success: function(data) {
            var dataparse=JSON.parse(data);
            if (dataparse[0] == "error") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Al parecer se elimino la columna: '+dataparse[1]+', descargue otra vez el formato y llene de nuevo');
            }else if(dataparse.length == 0){
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Se importo el excel con Exito');
                $('#modal_importar_ajuste').modal('hide');
                $('#envio_importar_ajuste').trigger('reset');
                datatable_resumen.ajax.reload(null, false);
            }else{
                 $('#div-error-ajuste').show();
                 var i;
                 var text = "";
                 for (i = 0; i < dataparse.length; i++) {
                          text += dataparse[i] + "<br>";
                     }
                 $("#text-error-ajuste").html(text);
                 datatable_resumen.ajax.reload(null, false);
            }
        },
        error: function(jqXHR) {
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('Al parecer hubo un error con el Servidor');
        }
    });
});

</script>