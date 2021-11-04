    <div class="modal fade bd-example-modal-lg" id="modal_familiaproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header  bg-dark text-white">
                    <h5 class="modal-title"><b>Ventana de familia de producto</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdFamiliaProducto" name="IdFamiliaProducto" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Nombre  </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="NombreFamiliaProducto" class="form-control" id="NombreFamiliaProducto" autocomplete="off" required>
                            </div>         
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Iniciales  </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="InicialesFamiliaNombreProducto" class="form-control" id="InicialesFamiliaNombreProducto" autocomplete="off" required>
                            </div>         
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Iniciales de Codigo  </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="InicialesFamiliaCodigoNombreProducto" class="form-control" id="InicialesFamiliaCodigoNombreProducto" autocomplete="off" required>
                            </div>         
                        </div>
                    </div> 
                    <div class="modal-footer">
                        <button  id="submit_enviar" type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>