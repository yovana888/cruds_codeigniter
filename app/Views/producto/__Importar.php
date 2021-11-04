<div class="modal fade" id="modal_importar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered mb-5" role="document">
        <div class="modal-content">
            <form id="envio_importar">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Importar Producto y su Inventario Inicial</h5>
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
                                        <p class="text-muted mb-1 lt">Formato Excel<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="#" id="enlace_descarga">Descargar Formato</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Seleccione Sede<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <select id="IdSedeImportar" name="IdSede" class="form-control-sm custom-select">
                                            <?php foreach ($sede as $row) : ?>
                                            <option value="<?php echo $row->IdSede; ?>"><?php echo $row->NombreSede; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
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
                                        <input type="file" class="form-control-file" id="archivo_excel"
                                            name="archivo_excel" required accept=".xls,.xlsx">
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
                                            <li class="text-muted lt">No agregue columnas adicionales en el Formato</li>
                                            <li class="text-muted lt">Asi mismo no elimine ninguna columna</li>
                                            <li class="text-muted lt">No elimine la segunda hoja del excel</li>
                                            <li class="text-muted lt">Revise que no tenga un mismo nombre un producto
                                                para una misma unidad de medida,porque este no se registrará </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn-line btn btn-sm" style="margin-left:80%;"
                        id="importar_excel">Procesar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
//Descarga Formato
$("#enlace_descarga").click(function() {
    window.open('Producto/decargarFormato');
});

$("#envio_importar").on("submit", function(e) {
    e.preventDefault();
    var data = new FormData(document.getElementById('envio_importar'));
    $.ajax({
        type: 'POST',
        url: "Producto/importarProducto",
        data: data,
        processData: false,
        contentType: false,
        async: false,
        success: function(data) {
            console.log(data);
            if (data.length == 0) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Se importo el excel con Exito');
                $('#modal_importar').modal('hide');
                $('#envio_importar').trigger('reset');
                datatable_producto.ajax.reload(null, false);
            } else {
                alertify.alert(
                    'Las siguientes filas no se insertaron, la razon puede ser que el producto ya estaba registrado con inventario inicial activo para esa misma unidad de medida y misma sede, pruebe buscar el producto en el sistema, o que el nombre estaba en blanco' +
                    data).set({
                    'closableByDimmer': true
                });
            }
        },
        error: function(jqXHR) {
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('Al parecer hubo un error con el Servidor');
        }
    });
});
</script>