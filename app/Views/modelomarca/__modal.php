<div class="modal fade bd-example-modal-lg" id="modal_modelomarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header">
                    <h5 class="modal-title">Ventana Modelo-Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdModeloMarca" name="IdModeloMarca" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Marca</label>
                            <div class="col-sm-8 mb-2">
                                    <select class="custom-select mr-sm-2" name="IdMarca" id="IdMarca" required>
                                        <option >No Selected</option>
                                        <?php foreach ($marcas as $row) : ?>
                                        <option
                                            value="<?php echo $row->IdMarca; ?>">
                                            <?php echo $row->NombreMarca; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>

                            
                            <label for="" class="col-sm-4 col-form-label">Nombre Modelo</label>
                            <div class="col-sm-8 mb-2">
                                    <input type="text" class="form-control mt-2" id="NombreModeloMarca" name="NombreModeloMarca" required>
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