<div class="modal fade bd-example-modal-lg" id="modal_sede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header">
                    <h5 class="modal-title">Ventana Sede</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdSede" name="IdSede" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Nombre Sede</label>
                            <div class="col-sm-8 mb-2">
                                    <input type="text" class="form-control mt-0" id="NombreSede" name="NombreSede" required>
                            </div>
                            
                            <label for="" class="col-sm-4 col-form-label">Codigo Sede</label>
                            <div class="col-sm-8 mb-2">
                                    <input type="text" class="form-control mt-2" id="CodigoSede" name="CodigoSede" maxlength="4"  required>
                            </div>

                            <label for="" class="col-sm-4 col-form-label">Direccion</label>
                            <div class="col-sm-8 mb-2">
                                    <input type="text" class="form-control mt-2" id="Direccion" name="Direccion" required>
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