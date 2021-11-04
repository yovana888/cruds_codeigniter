<div class="modal fade bd-example-modal-lg" id="modal_detalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                            <a class="nav-link active" data-toggle="tab" href="#show_detalles" role="tab" aria-selected="true">Detalles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#show_user" role="tab" aria-selected="false">Usuario-Maquina</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="show_detalles" role="tabpanel">
                            <div class="row">
                                <h6 class="mt-0 header-title" id="show_NombreProducto"></h6>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Codigo Comercial: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_CodigoComercialProducto"></p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Nombre Comercial: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_NombreComercialProducto"></p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Fabricante: </p>
                                </div>
                                <div class="col-md-8">
                                     <span class="badge badge-success" id="show_NombreFabricante"></span>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Linea: </p>
                                </div>
                                <div class="col-md-8">
                                    <span class="badge badge-info" id="show_NombreLineaProducto"></span>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Categoría: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_NombreCategoriaProducto"></p>
                                </div>
                            </div>
                            
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Tipo Producto: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_NombreTipoProducto"></p>
                                </div>
                            </div>
                            
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Tipo Activo: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_NombreTipoActivo"></p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Tipo Existencia: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_NombreTipoExistencia"></p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Tipo Servicio: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_NombreTipoServicio"></p>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <p style="color:#888;" class="font-14 mb-0">Otro Dato: </p>
                                </div>
                                <div class="col-md-8">
                                    <p style="color:#888;" class="font-14 mb-0" id="show_OtroDato"></p>
                                </div>
                            </div>

        

                        </div>
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