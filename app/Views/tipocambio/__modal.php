<div class="modal fade bd-example-modal-lg" id="modal_cambio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Tipo Cambio <img src="assets/images/ajax.gif" alt="cargando" id="gif"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" name="FechaCambio" id="FechaCambio" hidden>
                <input type="text" name="IdTipoCambio" id="IdTipoCambio" hidden>
                <div class="modal-body">
                    <div class="form-group row">
                        <code class="col-sm-12 highlighter-rouge" id="texto_add1"></code>
                        <label for="" class="col-sm-3 col-form-label mt-1"> Convertir soles a: </label>
                        <div class="col-sm-9 mb-2 mt-1" >
                            <select class="custom-select mr-sm-2" id="moneda_select">
                                <option value=''>No Selected</option>
                                <?php foreach ($monedas as $row) : ?>
                                    <option value="<?php echo $row->IdMoneda; ?>_<?php echo $row->CodigoMoneda; ?>_<?php echo $row->NombreMoneda; ?>">
                                        <?php echo $row->NombreMoneda; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" class="form-control" name="IdMonedaDestino" id="IdMonedaDestino" hidden>
                        </div>

                        <label for="" class="col-sm-3 col-form-label" id="label-venta" maxlength="5">Venta</label>
                        <div class="col-sm-9 mb-2" id="div-venta">
                            <input type="text" class="form-control" id="TipoCambioVenta" name="TipoCambioVenta" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label" id="label-compra"> Compra </label>
                        <div class="col-sm-9 mb-2" id="div-compra">
                            <input type="text" class="form-control mt-2" maxlength="5" id="TipoCambioCompra" name="TipoCambioCompra" required>
                        </div>
                        <code class="col-sm-12 highlighter-rouge" id="texto_add2"></code>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="submit_enviar" type="submit" class="btn btn-info">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>