<div class="modal fade bd-example-modal-lg" id="modal_detalles" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ventana Detalles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#show_detalles" role="tab"
                            aria-selected="true">De la Persona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#show_direcciones" role="tab"
                            aria-selected="false">Direcciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#show_user" role="tab"
                            aria-selected="false">Usuario-Maquina</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="show_detalles" role="tabpanel">
                        <div class="row">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Nombres: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_NombrePersona"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Tipo Persona: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_TipoPersona"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Rol: </p>
                            </div>
                            <div class="col-md-8">
                                <span class="badge badge-success" id="show_NombreRol"></span>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Telefono Fijo: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_TelefonoFijo"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Lugar Nacimiento: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_LugarNacimiento"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Fech. Nacimiento:</p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_FechaNacimiento"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Nacionalidad: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_Nacionalidad"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Genero: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_NombreGenero"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Estado Civil: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_NombreEstadoCivil"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Observacion: </p>
                            </div>
                            <div class="col-md-8">
                                <p style="color:#888;" class="font-14 mb-0" id="show_Observacion"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-4">
                                <p style="color:#888;" class="font-14 mb-0">Foto: </p>
                            </div>
                            <div class="col-md-8">
                                <img src="" width="100" height="100" id="show_Foto">
                            </div>
                        </div>


                    </div>
                    <!---Fin del 1er TAB-->

                    <div class="tab-pane p-3" id="show_direcciones" role="tabpanel">

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table" style="font-size: 11px" id="tabla_direccion">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">Id</th>
                                            <th>Descripcion</th>
                                            <th>Direccion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                            <th style="display:none;">Fila</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="nueva_direccion" class="btn btn-info btn-sm "
                                    style="font-size:11px;">Agregar Direccion</button>
                            </div>
                        </div>

                        <form id="envio_direccion" style="display:none;">
                            <input type="text" hidden id="IdDireccionPersona" name="IdDireccionPersona">
                            <!--Para Editar-->
                            <input type="text" hidden id="IdPersonaDetalle" name="IdPersonaDetalle">
                            <input type="text" hidden id="Fila">

                            <div class="row" id="div_new_direccion">
                                <div class="col-md-3">
                                    <p class="text-muted mb-1 lt ml-3">Descripcion</p>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="Descripcion" name="Descripcion"
                                        class="form-control input-sm input-h">
                                </div>
                            </div>


                            <div class="row mt-2" id="div_new_direccion">
                                <div class="col-md-3">
                                    <p class="text-muted mb-1 lt ml-3 ">Direccion</p>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="Direccion" name="Direccion"
                                        class="form-control input-sm input-h" autocomplete="off">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button type="button" id="save_direccion" class="btn btn-success btn-sm pull-right"
                                        style="font-size:11px;">Guardar</button>
                                    <button type="button" id="cancelar" class="btn btn-default btn-sm pull-right"
                                        style="font-size:11px;">Cancelar</button>

                                </div>
                            </div>
                        </form>

                    </div>
                    <!--Fin del 2do TAB-->
                    <div class="tab-pane p-3" id="show_user" role="tabpanel">

                        <div class="row">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Usuario Registro: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_UsuarioRegistro"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Fecha Registro: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_FechaRegistro"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Maquina Registro: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_MaquinaRegistro"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Usuario Modificacion: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_UsuarioModificacion"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Fecha Modificacion: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_FechaModificacion"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Maquina Modificacion: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_MaquinaModificacion"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Usuario Eliminacion: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_UsuarioEliminacion"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Fecha Eliminacion: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_FechaEliminacion"></p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-5">
                                <p style="color:#888;" class="font-14 mb-0">Maquina Eliminacion: </p>
                            </div>
                            <div class="col-md-7">
                                <p style="color:#888;" class="font-14 mb-0" id="show_MaquinaEliminacion"></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>