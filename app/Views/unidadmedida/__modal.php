<div class="modal fade bd-example-modal-lg" id="modal_unidadmedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Unidad Medida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" id="IdUnidadMedida" name="IdUnidadMedida" hidden>
                <div class="modal-body">
                    <div class="form-group row">

                        <label for="" class="col-sm-3 col-form-label"> Cod. SUNAT </label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control" id="CodigoUnidadMedidaSunat" name="CodigoUnidadMedidaSunat" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Unidad SUNAT</label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control mt-2" id="NombreUnidadMedida" name="NombreUnidadMedida" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Abrev. SUNAT</label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control mt-2" id="AbreviaturaUnidadMedida" name="AbreviaturaUnidadMedida" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Unidad Comercial</label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control mt-2" id="NombreUnidadComercial" name="NombreUnidadComercial" required>
                        </div>

                        <label for="" class="col-sm-3 col-form-label">Abrev. Comercial</label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control mt-2" id="AbreviaturaComercial" name="AbreviaturaComercial" required>
                        </div>

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