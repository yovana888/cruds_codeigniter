<div class="modal fade bd-example-modal-lg" id="modal_tipoexistencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header">
                    <h5 class="modal-title">Ventana Tipo Existencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdTipoExistencia" name="IdTipoExistencia" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Codigo Tipo Existencia </label>
                            <div class="col-sm-9 mb-2">
                                    <input type="text" class="form-control" id="CodigoTipoExistencia" name="CodigoTipoExistencia" required>
                            </div>
                            
                            <label class="col-sm-3 col-form-label">Nombre Tipo Existencia</label>
                            <div class="col-sm-9 mb-2">
                                    <input type="text" class="form-control mt-2" id="NombreTipoExistencia" name="NombreTipoExistencia" required>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button  id="submit_enviar" type="submit" class="btn btn-info">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>