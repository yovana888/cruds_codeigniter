<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered mb-5" role="document">
        <div class="modal-content">
            <form id="envio_edit">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Del Inventario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <input type="text" hidden id="ShowIdResumenInventario" name="IdResumenInventario">
                            <div class="col-md-12 ml-4 mt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Fecha Inventario<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="date" id="ShowFechaInventario" name="FechaInventario" class="form-control input-sm input-h"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Observacion<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="ShowObservacion" name="Observacion" class="form-control input-sm input-h" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-12">
                                         <span class="badge badge-primary">Usuarios</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">UsuarioRegistro:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-muted mb-1 lt" id="ShowUsuarioRegistro"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Fecha Registro:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-muted mb-1 lt" id="ShowFechaRegistro"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Usuario Modificacion:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-muted mb-1 lt" id="ShowUsuarioModificacion"></p>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Fecha Modificacion:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-muted mb-1 lt" id="ShowFechaModificacion"></p>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Usuario Eliminacion:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-muted mb-1 lt" id="ShowUsuarioEliminacion"></p>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-12 ml-4 mt-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Fecha Eliminacion:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p class="text-muted mb-1 lt" id="ShowFechaEliminacion"></p>
                                    </div>
                                </div>
                            </div>

                         
                        </div>
                    </div>
                    <button type="submit" class="btn-line btn btn-sm" style="margin-left:80%;" id="edit_resumen">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
