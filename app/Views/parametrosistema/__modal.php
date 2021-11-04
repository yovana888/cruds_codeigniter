    <div class="modal fade bd-example-modal-lg" id="modalparametrosistema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="formparametrosistema">
                    <div class="modal-header  bg-dark text-white">
                    <h5 class="modal-title">Ventana de parametro de sistema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <input type="text" id="IdParametroSistema" name="IdParametroSistema" hidden>
                    <div class="modal-body">
                        <div class="form-group row">                            
                            <label for="" class="col-sm-3 col-form-label"> Grupo de Parametro </label>
                            <div class="col-sm-9 mb-2">
                                <select class="selectpicker show-tick form-control " data-live-search="true" name="IdGrupoParametro" id="IdGrupoParametro" >
                                    <option >No Selected</option>
                                    <?php foreach ($grupoparametro as $row) : ?>
                                    <option
                                        value="<?php echo $row->IdGrupoParametro; ?>">
                                        <?php echo $row->NombreGrupoParametro; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="" class="col-sm-3 col-form-label"> Parametro de sistema</label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="NombreParametroSistema" class="form-control" id="NombreParametroSistema" autocomplete="off" required>
                            </div>
                            <label for="" class="col-sm-3 col-form-label"> Valor de parametro</label>
                            <div class="col-sm-9 mb-2">
                                <input type="text" name="ValorParametroSistema" class="form-control" id="ValorParametroSistema" autocomplete="off" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button  id="submit_enviar" type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
            	</form>
          	</div>
        </div>
    </div>