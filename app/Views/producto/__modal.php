<div class="modal fade bd-example-modal-lg" id="modal_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
        <form id="envio_search">
            <div class="modal-header">
                <h5 class="modal-title">Ventana Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="IdProducto" name="IdProducto" hidden>
                <div class="stepwizard  col-md-offset-3">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-info btn-circle">1</a>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-light btn-circle" disabled="disabled">2</a>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-light btn-circle" disabled="disabled">3</a>
                        </div>
                    </div>
                </div>
                <br>
                <form role="form" action="" method="post">
                    <div class="row setup-content" id="step-1">
                        <div class="col-md-6 ml-4">
                            <p class="font-14 mb-0 ">Familia y SubFamilia</p>
                            <hr width="50px" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Seleccione una Familia<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='Select-IdFamiliaProducto' name="Select-IdFamiliaProducto">
                                            <?php foreach ($familiaproducto as $row) : ?>
                                                <?php if ($row->IdFamiliaProducto == 0) : ?>
                                                    <option value=0 selected>No Especificado</option>
                                                <?php else : ?>
                                                    <option value="<?php echo $row->IdFamiliaProducto; ?>_<?php echo $row->InicialesFamiliaNombreProducto; ?>_<?php echo $row->InicialesFamiliaCodigoNombreProducto; ?>"><?php echo $row->NombreFamiliaProducto; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="text" hidden  id='IdFamiliaProducto' name="IdFamiliaProducto">
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-FamiliaProducto"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Familia-->
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Seleccione SubFamilia<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='IdSubFamiliaProducto' name="IdSubFamiliaProducto">
                                           
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-SubFamiliaProducto"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin SubFamilia-->

                            <p class="font-14 mb-2 ">Marca y Modelo</p>
                            <hr width="50" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Seleccione una Marca<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='Select-IdMarca' name='Select-IdMarca'>
                                            <?php foreach ($marca as $row) : ?>
                                                <?php if ($row->IdMarca == 0) : ?>
                                                    <option value=0 selected>No Especificado</option>
                                                <?php else : ?>
                                                    <option value="<?php echo $row->IdMarca; ?>_<?php echo $row->InicialesMarcaNombreProducto; ?>_<?php echo $row->InicialesMarcaCodigoProducto; ?>"><?php echo $row->NombreMarca; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="text" hidden id='IdMarca' name="IdMarca">
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-Marca"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Marca-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Seleccione un Modelo<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='IdModeloMarca' name='IdModeloMarca'>
                                           
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-ModeloMarca"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Modelo-->
                        </div>

                        <!--Segunda Columna-->
                        <div class="col-md-5">
                            <p class="font-14 mb-2 ">Codigo Producto</p>
                            <hr width="50" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Codigo Producto<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm input-h" id="CodigoProducto" name="CodigoProducto" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--Fin Codigo-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-muted mb-1 lt-m">Autogenerar por:</p>
                                        <select id="correlativo" name="correlativo">
                                            <option value="">Selecione</option>
                                            <option value="marca">Marca</option>
                                            <option value="familia">Familia</option>
                                            <option value="numerico">Numerico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Autogenerar codigo-->
                            <p class="font-14 mb-2 ">Nombre Producto</p>
                            <hr width="50" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control input-sm" id="NombreProducto" name="NombreProducto" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--Fin Nombre-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-muted mb-1 lt-m">Autocompletar con:</p>
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="Check1" >
                                                <label class="custom-control-label lt-m" for="Check1">Familia</label>
                                                <input type="text" hidden id="input_Check1">
                                            </div>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="Check2" >
                                                <label class="custom-control-label lt-m" for="Check2" >SubFamilia</label>
                                                <input type="text" hidden id="input_Check2">
                                            </div>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="Check3">
                                                <label class="custom-control-label lt-m" for="Check3">Marca</label>
                                                <input type="text" hidden id="input_Check3">
                                            </div>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="Check4">
                                                <label class="custom-control-label lt-m" for="Check4">Modelo</label>
                                                <input type="text" hidden id="input_Check4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Fin Autocompletar Nombre-->

                            <button class="btn btn-line nextBtn btn-lg pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <!--FIN DEL PRIMER TAB-->

                    <div class="row setup-content" id="step-2">
                        <div class="col-md-6 ml-4">
                            <p class="font-14 mb-0 ">Codigo y Nombre Comercial <i class="mdi mdi-information i-info ml-2" data-toggle="tooltip" data-placement="right" data-original-title="El Codigo y el Nombre Comercial es el se mostrará al Publico"></i></p>
                            <hr width="50px" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Codigo Comercial<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control input-sm input-h" id="CodigoComercialProducto" name="CodigoComercialProducto" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--Fin Codigo Comercial-->

                            <div class="form-group">
                                <div class="row" style="margin-top:-27px;">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="Check5">
                                                <label class="custom-control-label lt-m" for="Check5">Igualar con el Codigo Original?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Autocompletar con Codigo-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Nombre Comercial<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control input-sm input-h" id="NombreComercialProducto" name="NombreComercialProducto" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--Fin Codigo Comercial-->

                            <div class="form-group">
                                <div class="row" style="margin-top:-27px;">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-check-inline my-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="Check6">
                                                <label class="custom-control-label lt-m" for="Check6">Igualar con el Nombre Original?</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Autocompletar con NombreProducto-->
                        </div>

                        <!--Segunda Columna-->
                        <div class="col-md-5">
                            <p class="font-14  mt-1"> Linea y Fabricante</p>
                            <hr width="50px" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Linea Producto<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-control-sm custom-select" id='IdLineaProducto' name='IdLineaProducto'>
                                            <?php foreach ($lineaproducto as $row) : ?>
                                                <?php if ($row->IdLineaProducto == 0) : ?>
                                                    <option value=0 selected>No Especificado</option>
                                                <?php else : ?>
                                                    <option value="<?php echo $row->IdLineaProducto; ?>">
                                                        <?php echo $row->NombreLineaProducto; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-LineaProducto"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Linea-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt"> Fabricante<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="form-control-sm custom-select" id='IdFabricante' name='IdFabricante'>
                                            <?php foreach ($fabricante as $row) : ?>
                                                <?php if ($row->IdFabricante == 0) : ?>
                                                    <option value=0 selected>No Especificado</option>
                                                <?php else : ?>
                                                    <option value="<?php echo $row->IdFabricante; ?>">
                                                        <?php echo $row->NombreFabricante; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-Fabricante"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Fabricante-->
                            <button class="btn btn-line nextBtn btn-lg pull-right" type="button">Next</button>
                        </div>
                    </div>
                    <!--Fin del Segundo Tab-->

                    <div class="row setup-content" id="step-3">
                        <div class="col-md-6 ml-4">
                            <p class="font-14 "> Categoria Producto</p>
                            <hr width="50px" class="ml-0 line">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Seleccione Categoria<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='IdCategoriaProducto' name="IdCategoriaProducto">
                                            <?php foreach ($categoriaproducto as $row) : ?>
                                                <option value="<?php echo $row->IdCategoriaProducto; ?>">
                                                    <?php echo $row->NombreCategoriaProducto; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <!--Fin Categoria Producto-->
                            <div class="form-group" id="div-tiposervicio">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt"> Tipo Servicio<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='IdTipoServicio' name="IdTipoServicio">
                                            <?php foreach ($tiposervicio as $row) : ?>
                                                <?php if ($row->IdTipoServicio == 0) : ?>
                                                    <option value=0 selected>No Especificado</option>
                                                <?php else : ?>
                                                <option value="<?php echo $row->IdTipoServicio; ?>">
                                                    <?php echo $row->NombreTipoServicio; ?>
                                                </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type = "button" class="btn btn-circle btn-il btn-sm" id="btn-TipoServicio"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Categoria Producto-->

                            <div class="form-group" id="div-tipoactivo">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Seleccione Tipo Activo<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='IdTipoActivo' name="IdTipoActivo">
                                            <?php foreach ($tipoactivo as $row) : ?>
                                                <?php if ($row->IdTipoActivo == 0) : ?>
                                                    <option value=0 selected>No Especificado</option>
                                                <?php else : ?>
                                                <option value="<?php echo $row->IdTipoActivo; ?>">
                                                    <?php echo $row->NombreTipoActivo; ?>
                                                </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Tipo Activo-->

                            <p class="font-14 mb-0">Clasificacion por Tipo</p>
                            <hr width="50px" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Tipo Producto</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check-inline">
                                            <label class="form-check-label lt text-muted">
                                                <input type="radio" class="form-check-input" id="rb-bien" name="IdTipoProducto" value="1" checked>Bien
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label lt text-muted">
                                                <input type="radio" class="form-check-input" id="rb-servicio" name="IdTipoProducto" value="2">Servicio
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Tipo Producto-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="text-muted mb-1 lt">Tipo Existencia<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control-sm custom-select" id='IdTipoExistencia' name="IdTipoExistencia">
                                            <?php foreach ($tipoexistencia as $row) : ?>
                                                <option value="<?php echo $row->IdTipoExistencia; ?>">
                                                    <?php echo $row->NombreTipoExistencia; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Tipo Existencia-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                       <span class="badge badge-primary">Otro Dato:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control input-sm input-h" id="OtroDato" name="OtroDato" value="-">
                                    </div>
                                </div>
                            </div>
                             <!--Fin Otro Dato-->
                        </div>
                        <!--fin de la primera columna-->

                        <div class="col-md-5">
                            <p class="font-14 mb-2 ">Codigo de Barras</p>
                            <hr width="50" class="ml-0 line">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-1 lt">Ingrese el Codigo<code class="rq">*</code></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-sm input-h" id="CodigoBarraProducto" name="CodigoBarraProducto" required="required">
                                    </div>
                                </div>
                            </div>
                            <!--Fin Codigo-->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-muted mb-1 lt-m">Autogenerar por:</p>
                                        <select id="correlativo2" name="correlativo2">
                                            <option value="">Seleccione</option>
                                            <option value="codigo_producto">Codigo Producto</option>
                                            <option value="fecha_hora">Fecha Hora</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Autogenerar codigo para codigo de barras-->

                            <p class="font-14 mb-2 ">Imagen</p>
                            <hr width="50" class="ml-0 line">
                            <div class="form-group" style="margin-top:-15px;">
                                <div class="row ">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="thumbnail">
                                            <div id="div_file">
                                                <input type="file" id="file-input" name="Foto" class="subir-img" />
                                                <img id="imgSalida" src="assets/images/productos/add-image.png" width="100" height="100" />
                                                <input type="text" hidden id="NombreFoto" name="NombreFoto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                             <!--Fin Imagen-->
                             <button  id="submit_enviar" type="submit" class="btn btn-primary ">Guardar</button>
                        </div>
                        <!--fin de la segunda columna-->
                    </div>
                </form>

            </div>
        </div>
    </div>
    </form>
</div>
</div>