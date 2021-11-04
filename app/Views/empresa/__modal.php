<div class="modal fade" id="modal_empresa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_empresa">
                <div class="modal-header">
                    <h3 class="modal-title ml-2">Ventana Empresa</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="margin: 1em;">
                    <input type="text" id="IdEmpresa" name="IdEmpresa" hidden>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group form-show-validation row">
                                <div class="input-group">
                                    <input type="text" class="form-control input-border-bottom" name="CodigoEmpresa"
                                        id="CodigoEmpresa" placeholder="RUC (11 DIGITOS)" autocomplete="off"
                                        maxlength='11' required>
                                    <div class="input-group-append">
                                        <button class="btn-link btn-primary btn-lg" type="button" title="Buscar RUC"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-floating-label  form-show-validation row">
                                <input name="RazonSocial" id="RazonSocial" type="text"
                                    class="form-control input-border-bottom" required="">
                                <label for="RazonSocial" class="placeholder">Razon Social</label>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group form-floating-label  form-show-validation row">
                                <input name="DomicilioFiscal" id="DomicilioFiscal" type="text"
                                    class="form-control input-border-bottom" required="">
                                <label for="DomicilioFiscal" class="placeholder">DomicilioFiscal</label>
                            </div>

                            <div class="form-group form-floating-label  form-show-validation row">
                                <input name="NombreComercial" id="NombreComercial" type="text"
                                    class="form-control input-border-bottom" required="">
                                <label for="NombreComercial" class="placeholder">NombreComercial</label>
                            </div>

                        </div>
                    </div>
                   
                    <p class="font-14">Certificado Digital</p>
                    <hr width="50px" class="line">
             
                </div>
                <div class="modal-footer">
                    <button id="submit_enviar" type="submit" class="btn btn-primary btn-sm ">Guardar</button>
                    <button type="button" class="btn btn-primary btn-sm btn-border"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>