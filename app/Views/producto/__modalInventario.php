<div class="modal fade" id="modal_inventario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered mb-5" role="document">
        <div class="modal-content">
            <form id="envio_inventario">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Editar Inventario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <input type="text" hidden id="Show_IdResumenInventario" name="IdResumenInventario">
                            <input type="text" hidden id="Show_IdInventario" name="IdInventario">
                            <input type="text" hidden id="Show_IdProducto" name="IdProducto">
                            <input type="text" hidden id="Show_IdSede" name="IdSede">
                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-11">
                                        <p class="mb-1 lt" id="text-inventario"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Unidad Medida<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <select id="Show_IdUnidadMedida" name="IdUnidadMedida"
                                            class="form-control-sm custom-select">
                                            <?php foreach ($unidad as $row) : ?>
                                            <?php if ($row->IdUnidadMedida == '58') : ?>
                                            <option value="<?php echo $row->IdUnidadMedida; ?>" selected>
                                                <?php echo $row->NombreUnidadMedida; ?></option>
                                            <?php else : ?>
                                            <option value="<?php echo $row->IdUnidadMedida; ?>">
                                                <?php echo $row->NombreUnidadMedida; ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Equivalencia Unidad<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="number" name="EquivalenciaUnidad" id="Show_EquivalenciaUnidad" class="form-control input-sm input-h" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Stock<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="number" name="Stock" id="Show_Stock" class="form-control input-sm input-h"  required> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Cantidad Conteo<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="number" name="CantidadConteo" id="Show_CantidadConteo" class="form-control input-sm input-h" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Costo Unitario<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="number" name="CostoUnitario" id="Show_CostoUnitario" class="form-control input-sm input-h" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Costo Total <code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="number" name="CostoTotal" id="Show_CostoTotal" class="form-control input-sm input-h" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Observacion</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="Observacion" id="Show_Observacion" class="form-control input-sm input-h" required>
                                    </div>
                                </div>
                            </div>
                            
                         
                        </div>
                    </div>
                    <button type="submit" class="btn-line btn btn-sm" style="margin-left:80%;">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
