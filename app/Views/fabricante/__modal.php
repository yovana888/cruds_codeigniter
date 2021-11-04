    <div class="modal fade bd-example-modal-lg" id="modal_fabricante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header  bg-dark text-white">
                    <h5 class="modal-title"><b>Ventana de fabricante</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdFabricante" name="IdFabricante" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Nombre  </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="NombreFabricante" class="form-control" id="NombreFabricante" autocomplete="off" required>
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