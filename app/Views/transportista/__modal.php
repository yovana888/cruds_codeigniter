<div class="modal fade" id="modal_transportista" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title ml-2">Ventana Transportista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id='editar'>
                        <div class="row ml-2">
                            <div class="col-md-2">
                                <p class="text-muted mb-1 lt">Persona<code class="rq">*</code></p>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group" style="margin-left:-30px;">
                                    <input type="text" class="form-control input-sm input-h  limpiar" id="search"
                                        name="search" placeholder="Buscar por Nombres, DNI o RUC" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary btn-sm btn-h" id="btn-nueva-persona"
                                                type="button">Nueva Persona</button>
                                        </span>
                                    </div>
                                </div>
                                <span id="msg-search" class="ocultar text-muted lt" style="margin-left:-28px;">No se
                                    encontro resultados, haga clic en nueva persona y digite el DNI o RUC</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id='nuevo'>
                        <div class="row ml-2">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-prepend">
                                            <select class="form-control-sm custom-select" id='IdTipoDocumentoIdentidad'
                                                name="IdTipoDocumentoIdentidad">
                                                <?php foreach ($tipodocumentoidentidad as $row) : ?>
                                                <?php if ($row->NombreAbreviado == 'DNI') : ?>
                                                <option value="<?php echo $row->IdTipoDocumentoIdentidad; ?>" selected>
                                                    <?php echo $row->NombreAbreviado; ?></option>
                                                <?php else : ?>
                                                <option value="<?php echo $row->IdTipoDocumentoIdentidad; ?>">
                                                    <?php echo $row->NombreAbreviado; ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input-sm input-h  limpiar" id="NumDocumento"
                                        maxlength='8' placeholder="DNI (8 DIGITOS)" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary btn-sm btn-h" id="btn-buscardocumento"
                                                type="button"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <span id="msg-search-nuevo" class="ocultar text-muted lt" style="margin-left:-28px;">No
                                    se encontro resultados, llene los datos manualmente si cree que es correcto</span>
                            </div>

                            <div class="col-md-2">
                                <select class="form-control-sm custom-select" id='IdTipoPersona' name="IdTipoPersona">
                                    <?php foreach ($tipopersona as $row) : ?>
                                    <?php if ($row->IdTipoPersona == 2) : ?>
                                    <option value="<?php echo $row->IdTipoPersona; ?>" selected>
                                        <?php echo $row->NombreTipoPersona; ?></option>
                                    <?php else : ?>
                                    <option value="<?php echo $row->IdTipoPersona; ?>">
                                        <?php echo $row->NombreTipoPersona; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-default btn-sm btn-h" id="btn-cancelar"
                                    type="button">Cancelar</button>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row ml-2">
                            <div class="col-md-6">
                                <p class="font-14 mb-0 ">Datos de la Persona</p>
                                <hr width="50px" class="ml-0 line">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Num Documento</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-sm input-h" class="font-14 mb-0"
                                            id="NumeroDocumentoIdentidad" name="NumeroDocumentoIdentidad">
                                        <p id="estado_condicion" class="mb-1 lt" style="color:#0176fc;"></p>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Nombres</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-sm input-h" class="font-14 mb-0"
                                            id="NombreCompleto" name="NombreCompleto" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Apellidos</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-sm input-h" class="font-14 mb-0"
                                            id="ApellidoCompleto" name="ApellidoCompleto" required>
                                    </div>
                                </div>

                                <div class="row  mt-3">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Fecha Nacimiento</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="FechaNacimiento" id="FechaNacmiento"
                                            class="form-control input-sm input-h">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Lugar Nacimiento</p>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="checkbox" id="CheckPais" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        data-original-title="Buscar otros paises">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control input-sm input-h typeahead "
                                                id="LugarNacimiento" name="LugarNacimiento" autocomplete="off">
                                        </div>
                                        <span id="msg-search-lugar" class="text-muted lt msg">No se encontro
                                            resultados</span>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Nacionalidad</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-sm input-h" class="font-14 mb-0"
                                            id="Nacionalidad" name="Nacionalidad">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Email</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control input-sm input-h" id="Email"
                                            name="Email">
                                        <span id="valid-msg-em" style="color:#00C900;"
                                            class="ocultar smg">✓Valido</span>
                                        <span id="error-msg-em" style="color:red;" class="ocultar"></span>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Telefono</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="tel" class="form-control input-sm input-h" id="InputTelefono"
                                            name="InputTelefono" style="width:111%">
                                        <input type="text" hidden id="TelefonoFijo" name="TelefonoFijo">
                                        <span id="valid-msg-tel" style="color:#00C900;"
                                            class="ocultar smg">✓Valido</span>
                                        <span id="error-msg-tel" style="color:red;" class="ocultar"></span>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Celular</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control input-sm input-h" type="tel" id="InputCelular"
                                            style="width:111%">
                                        <input type="text" hidden id="Celular" name="Celular">
                                        <span id="valid-msg-cel" style="color:#00C900;"
                                            class="ocultar smg">✓Valido</span>
                                        <span id="error-msg-cel" style="color:red;" class="ocultar"></span>
                                    </div>
                                </div>

                                <div class="row mt-3" id="div-direccion">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Direccion</p>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control input-sm input-h" type="text"
                                            id="DireccionTransportista" name="Direccion" autocomplete="off">
                                    </div>
                                </div>

                            </div>
                            <!--Fin de la Primera Columna-->
                            <div class="col-md-6">
                                <p class="font-14 mb-0 ">Del Transportista</p>
                                <hr width="50px" class="ml-0 line">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Nº Constancia Inscripcion</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control input-sm input-h" required
                                            class="font-14 mb-0" id="NumeroConstanciaInscripcion"
                                            name="NumeroConstanciaInscripcion">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Nº Licencia Conducir</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control input-sm input-h" required
                                            class="font-14 mb-0" id="NumeroLicenciaConducir"
                                            name="NumeroLicenciaConducir">
                                    </div>
                                </div>


                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Rol del transportista</p>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <select class="form-control-sm custom-select" id='IdRol' name='IdRol'>
                                                <?php foreach ($rol as $row) : ?>
                                                <option value="<?php echo $row->IdRol; ?>">
                                                    <?php echo $row->NombreRol; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary btn-sm btn-h" id="btn-Rol"
                                                        type="button"><i class="fa fa-plus"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <p class="font-14 mb-0 ">Otros Datos</p>
                                <hr width="50px" class="ml-0 line">

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <p class="text-muted  lt">Estado Civil</p>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="IdEstadoCivil" id="IdEstadoCivil"
                                            class="form-control-sm custom-select">
                                            <?php foreach ($estadocivil as $row) : ?>
                                            <option value="<?php echo $row->IdEstadoCivil; ?>">
                                                <?php echo $row->NombreEstadoCivil; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!--Fecha Nacm--->

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <p class="text-muted  lt">Observacion</p>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control input-sm input-h" id="Observacion"
                                            name="Observacion" value="-">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Genero</p>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check-inline">
                                            <label class="form-check-label lt text-muted">
                                                <input type="radio" class="form-check-input" id="rb-M" name="IdGenero"
                                                    value="2" checked>Masculino
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label lt text-muted">
                                                <input type="radio" class="form-check-input" id="rb-F" name="IdGenero"
                                                    value="1">Femenino
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Foto</p>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="thumbnail">
                                            <div id="div_file">
                                                <input type="file" id="file-input" name="Foto" class="subir-img" />
                                                <img id="imgSalida" src="assets/images/personas/persona.png" width="100"
                                                    height="100" />
                                                <input type="text" hidden id="NombreFoto" name="NombreFoto"
                                                    value="persona.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---para nueva persona-->
                                <input type="text" hidden name="IdPersona" id="IdPersona">
                                <input type="text" hidden name="IdTransportista" id="IdTransportista">
                                <input type="text" hidden name="RazonSocial" id="RazonSocial">
                                <input type="text" hidden name="CondicionContribuyente" id="CondicionContribuyente">
                                <input type="text" hidden name="EstadoContribuyente" id="EstadoContribuyente">
                                <input type="text" hidden name="NombreComercial" id="NombreComercial">
                                <input type="text" hidden name="UbicacionEmpresa" id="UbicacionEmpresa">
                            </div>
                            <!--Fin de la 2da Columan-->
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