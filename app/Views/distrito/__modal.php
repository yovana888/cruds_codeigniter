<div class="modal fade bd-example-modal-lg" id="modal_distrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header">
                    <h5 class="modal-title">Ventana de Distrito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdDistrito" name="IdDistrito"  hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Departamento </label>
                            <div class="col-sm-9 mb-2">
                                    <select class="custom-select mr-sm-2"  name="IdDepartamento" id="IdDepartamento">
                                                <option >No Selected</option>
                                                <?php foreach ($departamentos as $row) : ?>
                                                <option
                                                    value="<?php echo $row->IdDepartamento; ?>">
                                                    <?php echo $row->NombreDepartamento; ?>
                                                </option>
                                                <?php endforeach; ?>
                                    </select>
                            </div>

                            <label for="" class="col-sm-3 col-form-label"> Provincia</label>
                            <div class="col-sm-9 mb-2">
                                    <select class="custom-select mr-sm-2"  name="IdProvincia" id="IdProvincia" >

                                    </select>
                            </div>

                            <label for="" class="col-sm-3 col-form-label"> Codigo de Ubigeo </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="CodigoUbigeoDistrito" class="form-control" id="CodigoUbigeoDistrito" autocomplete="off" required>
                            </div>
                            <label for="" class="col-sm-3 col-form-label"> Nombre de distrito </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="NombreDistrito" class="form-control" id="NombreDistrito" autocomplete="off" required>
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