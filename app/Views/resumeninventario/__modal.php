<div class="modal fade bd-example-modal-lg" id="modal_resumen" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="envio_resumen" style="margin: 1em;">
                    <input type="text" hidden id="IdResumenInventario" name="IdResumenInventario">

                    <div class="row">
                        <div class="col-md-2">
                            <p class="text-muted mb-1 lt ml-1">Seleccione la Sede</p>
                        </div>
                        <div class="col-md-4">
                            <select id="IdSede" name="IdSede" class="form-control-sm custom-select">
                                <?php foreach ($sede as $row) : ?>
                                <option value="<?php echo $row->IdSede; ?>"><?php echo $row->NombreSede; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <p class="text-muted mb-1 lt ml-1">Tipo Inventariado</p>
                        </div>
                        <div class="col-md-4">
                            <select id="IdTipoInventario" name="IdTipoInventario" class="form-control-sm custom-select">
                                <?php foreach ($tipoinventario as $row) : ?>
                                <option value="<?php echo $row->IdTipoInventario; ?>">
                                    <?php echo $row->NombreTipoInventario; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-2">
                            <p class="text-muted mb-1 lt ml-1">Fecha del Inventario</p>
                        </div>
                        <div class="col-md-4">
                            <input type="date" id="FechaInventario" name="FechaInventario"
                                class="form-control input-sm input-h limpiar" required>
                        </div>
                        <div class="col-md-2">
                            <p class="text-muted mb-1 lt ml-1">Observacion</p>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-sm input-h limpiar" name="Observacion"
                                id="Observacion">
                        </div>
                    </div>

                    <span class="badge badge-primary mt-3">Detalle Inventario</span>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="input-group">

                                <input type="text" class="form-control input-sm input-h" id="search"
                                    placeholder="Buscar Producto por Nombre o Codigo" name="search">
                                <div class="input-group-append">
                                    <span class="input-group-append">
                                        <select id="IdUnidadMedidaTemporal" 
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
                                    </span>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-append">
                                        <button class="btn btn-primary btn-sm btn-h" id="btn-validarproducto"
                                            type="button"><i class="fa fa-plus"></i></button>
                                    </span>
                                </div>
                            </div>
                            <p id="msg-validacion" class="lt" style="color:#f85e82;"></p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12"  style="margin: 1em;">
                                <input type="text" hidden id="IdProductoTemporal">
                                <div class="table-responsive">
                                    <table class="table" style="font-size: 10px; margin-left:-15px;" id="detalles" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nombre Producto</th>
                                                <th>Unidad Med.</th>
                                                <th>Equ.Unidad</th>
                                                <th>Stock</th>
                                                <th>CantConteo</th>
                                                <th>CostoUnit</th>
                                                <th>CostoTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button  id="submit_enviar" type="submit" class="btn btn-primary pull-right">Guardar</button>

            </div>

        </div>

        </form>
    </div>
</div>
</div>