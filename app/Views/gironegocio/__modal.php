<div class="modal fade bd-example-modal-lg" id="modal_negocio" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h3 class="modal-title">Ventana Giro Negocio</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" id="IdGiroNegocio" name="IdGiroNegocio" hidden>
                <div class="modal-body">

                    <div class="form-group form-show-validation row">
                        <label for="name" class="col-md-4 col-sm-4 mt-sm-2">Nombre Giro Negocio<span
                                class="required-label">*</span></label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control" id="NombreGiroNegocio" name="NombreGiroNegocio"
                                required="" autocomplete="off">
                        </div>
                    </div>


                    <div class="row form-group div-user">
                        <div class="col-md-12">
                            <span class="badge badge-count">Usuarios</span>
                        </div>
                    </div>
                    
                    <div class="form-group row div-user">
                        <ul class="card-report-links">
                            <li class="card-category" id="ShowUsuarioModificacion"></li>
                            <li class="card-category" id="ShowFechaModificacion"></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button id="submit_enviar" type="submit" class="btn btn-primary btn-sm ">Guardar</button>
                    <button type="button" class="btn btn-primary btn-sm btn-border"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>