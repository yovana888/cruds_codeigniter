<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered mb-5" role="document">
        <div class="modal-content">
            <form id="envio_delete">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Ventana Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <input type="text" hidden id="deleteIdResumenInventario" name="IdResumenInventario">
                            <input type="text" hidden id="deleteIdInventario" name="IdInventario">
                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-11">
                                    <div class="alert alert-danger">
                                        <strong>Advertencia!</strong> Esta seguro de eliminar este registro?, esta es una accion irrevertible.
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Motivo<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="Observacion" class="form-control input-sm input-h" required id="DeleteMotivo">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn-danger btn btn-sm" style="margin-left:80%;">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
