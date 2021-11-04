<div class="modal fade bd-example-modal-lg" id="modal_tipooperacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Tipo Operacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" id="IdTipoOperacion" name="IdTipoOperacion" hidden>
                <div class="modal-body">
                    <div class="form-group row">

                        <label class="col-sm-3 col-form-label"> Codigo Operacion </label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control" id="CodigoTipoOperacion" name="CodigoTipoOperacion" required>
                        </div>

                        <label class="col-sm-3 col-form-label">Cod. SUNAT</label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control mt-2" id="CodigoSUNAT" name="CodigoSUNAT" required>
                        </div>

                        <label class="col-sm-3 col-form-label">Tipo Operacion</label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control mt-2" id="NombreTipoOperacion" name="NombreTipoOperacion" required>
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



