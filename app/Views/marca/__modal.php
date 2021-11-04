<div class="modal fade bd-example-modal-lg" id="modal_marca" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" id="IdMarca" name="IdMarca" hidden>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> Nombre Marca </label>
                        <div class="col-sm-8 mb-3">
                            <input type="text" class="form-control" id="NombreMarca" name="NombreMarca" required>
                        </div>

                        <label for="" class="col-sm-4 col-form-label"> Iniciales Marca NombreProducto </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="InicialesMarcaNombreProducto"
                                name="InicialesMarcaNombreProducto" required>
                        </div>
                        
                        <label for="" class="col-sm-4 col-form-label"> </label>
                        <div class="custom-control custom-checkbox col-sm-6 ml-3 mb-2">
                                <input type="checkbox" class="custom-control-input" id="Check1">
                                <label class="custom-control-label lt-m" for="Check1">Igualar al Nombre Marca?</label>
                        </div>
                         
                        <label for="" class="col-sm-4 col-form-label"> Iniciales Marca CodigoProducto </label>
                        <div class="col-sm-8  mt-1 ">
                            <input type="text" class="form-control" id="InicialesMarcaCodigoProducto"
                                name="InicialesMarcaCodigoProducto" required>
                        </div>

                        <label for="" class="col-sm-4 col-form-label"> </label>
                        <div class="custom-control custom-checkbox col-sm-6 ml-3 mb-2">
                                <input type="checkbox" class="custom-control-input" id="Check2">
                                <label class="custom-control-label lt-m" for="Check2">Extraer 4 primeras letras de la marca?</label>
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