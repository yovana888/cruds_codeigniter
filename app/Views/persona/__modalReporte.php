<div class="modal fade bd-example-modal-lg" id="modal_reporte" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content" style="width: 100%;">
            <form id="procesar_reporte">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Reporte Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ml-1">
                        <p class="font-14 mb-0 ">Tipo de Reporte</p>
                        <hr width="50px" class="ml-0 line">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <select class="form-control-sm custom-select" id='IdReporteDocumento' name="IdReporteDocumento">
                                        <option value="all">Todo Tipo de Documento</option>
                                        <option value="RUC">Solo RUC</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check-inline">
                                        <label class="form-check-label lt text-muted">
                                            <input type="radio" class="form-check-input" id="rb-pdf" name="rb-reporte"
                                                value="pdf" checked>PDF
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label lt text-muted">
                                            <input type="radio" class="form-check-input" id="rb-excel" name="rb-reporte"
                                                value="xlsx">EXCEL
                                        </label>
                                    </div>
                                </div>
                            </div>                 
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="procesar" type="button" class="btn btn-info">Procesar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
    </form>
</div>
</div>