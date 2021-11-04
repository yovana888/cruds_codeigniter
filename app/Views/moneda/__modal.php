<div class="modal fade bd-example-modal-lg" id="modal_moneda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header  bg-dark text-white">
                    <h5 class="modal-title"><b>Ventana de monedas</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdMoneda" name="IdMoneda" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Codigo </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="CodigoMoneda" class="form-control" id="CodigoMoneda" autocomplete="off" required>
                            </div>
                        
                            <label for="" class="col-sm-3 col-form-label"> Nombre </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="NombreMoneda" class="form-control" id="NombreMoneda" autocomplete="off" required>
                            </div>
                        
                            <label for="" class="col-sm-3 col-form-label"> Simbolo </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="SimboloMoneda" class="form-control" id="SimboloMoneda" autocomplete="off" required>
                                
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
 