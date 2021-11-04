	<div class="modal fade bd-example-modal-lg" id="modal_departamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="envio_search">
                    <div class="modal-header">
                    <h5 class="modal-title">Ventana de Departamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdDepartamento" name="IdDepartamento" hidden>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"> Nombre </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="NombreDepartamento" class="form-control" id="NombreDepartamento" autocomplete="off" required>
                            </div>

                            <label for="" class="col-sm-3 col-form-label"> Codigo de Ubigeo </label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="CodigoUbigeoDepartamento" class="form-control" id="CodigoUbigeoDepartamento" autocomplete="off" required>
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