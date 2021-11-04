<div class="modal fade bd-example-modal-lg" id="modal_rol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Rol Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" id="IdRol" name="IdRol" hidden>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label"> Rol: </label>
                        <div class="col-sm-9 mb-2">
                            <input type="text" class="form-control" id="NombreRol" name="NombreRol" required>
                        </div>
                        
                        <label for="" class="col-sm-3 col-form-label">Permisos</label>
                        <div class="col-sm-8 mb-2 mt-1 ml-2">
                            <div class="control">
                              
                                <div class="form-check-inline my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"  name="VerTodasVentas" id="CheckVentas" onclick="checkValor(this.id,this.checked);">
                                        <label class="custom-control-label lt-m" for="CheckVentas">Ver Todas Ventas</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-2">
                                        <input type="checkbox" class="custom-control-input" id="CheckCombo" name="VerComboVentas" onclick="checkValor(this.id,this.checked);">
                                        <label class="custom-control-label lt-m" for="CheckCombo" >Ver Combo Ventas</label>
                                               
                                    </div>
                                </div>                             
                            </div>
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