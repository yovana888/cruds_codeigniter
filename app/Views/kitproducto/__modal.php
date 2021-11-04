<div class="modal fade bd-example-modal-lg" id="modal_kitproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Ventana Kit Producto</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p class="text-muted font-14 mb-3">Familia:</p>
                    </div>
                    <div class="col md-9">
                        <div class="input-group">
                            <select class="form-control-sm custom-select" id='Select-FamiliaProducto'>
                                <?php foreach ($familiaproducto as $row) : ?>
                                    <?php if ($row->IdFamiliaProducto == 0) : ?>
                                        <option value=0 selected>No Especificado</option>
                                    <?php else : ?>
                                        <option value="<?php echo $row->IdFamiliaProducto; ?>_<?php echo $row->InicialesFamiliaNombreProducto; ?>_<?php echo $row->InicialesFamiliaCodigoNombreProducto; ?>"><?php echo $row->NombreFamiliaProducto; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <span class="input-group-append">
                                <button class="btn btn-primary btn-sm btn-h" id="btn-FamiliaProducto" type="button"><i class="mdi mdi-plus"></i></button>
                            </span>
                        </div>
                        <input type="text" hidden id='IdFamiliaProducto' name="IdFamiliaProducto">
                    </div>
                </div>
                <!--Fin Familia-->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p class="text-muted font-14 mb-3">Marca:</p>
                    </div>
                    <div class="col md-9">
                        <div class="input-group">
                            <select class="form-control-sm custom-select " id='Select-Marca'>
                                <?php foreach ($marca as $row) : ?>
                                    <?php if ($row->IdMarca == 0) : ?>
                                        <option value=0 selected>No Especificado</option>
                                    <?php else : ?>
                                        <option value="<?php echo $row->IdMarca; ?>_<?php echo $row->InicialesMarcaNombreProducto; ?>_<?php echo $row->InicialesMarcaCodigoProducto; ?>"><?php echo $row->NombreMarca; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <span class="input-group-append">
                                <button class="btn btn-primary btn-sm btn-h" id="btn-Marca" type="button"><i class="mdi mdi-plus"></i></button>
                            </span>
                        </div>
                        <input type="text" hidden id='IdMarca' name="IdMarca">
                    </div>
                </div>
                <!--Fin Marca-->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p class="text-muted font-14 mb-3">U. Medida:</p>
                    </div>
                    <div class="col-md-9">
                        <select class="form-control-sm custom-select" id='Select-Marca'>
                            <option>Seleccione</option>
			                <?php foreach ($unidad as $row) : ?>
			                    <option value="<?php echo $row->IdUnidadMedida; ?>"><?php echo $row->NombreUnidadMedida; ?></option>
			                <?php endforeach; ?>
                        </select>
                        <input type="text" hidden id='IdUnidadMedida' name="IdUnidadMedida">
                    </div>
                </div>
                <!--Fin Unidad Medida-->

                <div class="row mt-2">
                    <div class="col-md-3">
                        <p class="text-muted font-14 mb-3">Codigo:</p>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm input-h" id="CodigoKit" name="CodigoKit" required="required">
                    </div>
                </div>
                <!--Fin Codigo-->

                <div class="row mt-1">
                    <div class="col-md-3"></div>
                    <div class="col-md-8">
                        <div class="form-check-inline my-2">
                            <p class="text-muted mb-1 lt-m">Autogenerar con:</p>
                            <select id="correlativo" name="correlativo" class="ml-2 mb-2" style="font-size: 12px; color:#7a7a7b;">
                                <option value="">Selecione</option>
                                <option value="marca">Marca</option>
                                <option value="familia">Familia</option>
                                <option value="numerico">Numerico</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--Fin Autogenerar codigo-->

                <div class="row mt-0">
                    <div class="col-md-3">
                        <p class="text-muted font-14 mb-3">Nombre:</p>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control input-sm input-h" id="NombreKit" name="NombreKit" required="required">
                    </div>
                </div>
                <!--Fin Nombre Kit-->

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <div class="form-check-inline my-2">
                            <p class="text-muted mb-1 lt-m">Autocompletar con:</p>
                            <div class="custom-control custom-checkbox ml-2 mb-3">
                                <input type="checkbox" class="custom-control-input" id="Check1">
                                <label class="custom-control-label lt-m" for="Check1">Familia</label>
                                <input type="text" hidden id="input_Check1">
                            </div>

                            <div class="custom-control custom-checkbox ml-2 mb-3">
                                <input type="checkbox" class="custom-control-input" id="Check3">
                                <label class="custom-control-label lt-m" for="Check3">Marca</label>
                                <input type="text" hidden id="input_Check3">
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Autocompletar Nombre Kit-->

                <div class="row">
                    <div class="col md-12">
                        <div class="input-group">
                           <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                           </div>
                            <input type="text" placeholder="Buscar Producto por Nombre o Codigo" class="form-control input-sm input-h" id="InputProducto" style="font-size:12px;">
                            <span class="input-group-append"><input placeholder="Cantidad" type="number" min="1" oninput="validity.valid||(value='');" title="cantidad" class="form-control input-h" id="Cantidad" style=" width: 9em;font-size:12px;"> </span>
                            <span class="input-group-append">
                                <button class="btn btn-primary btn-sm btn-h" id="btn-AgregarProducto" type="button" data-toggle="tooltip" data-placement="bottom"  data-original-title="Agregar Producto al Kit"><i class="mdi mdi-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <!--Fin Buscar Producto-->

                <div class="row mt-4">
                    <div class="col-md-12">
                        <table class="table" >
                            <thead style="font-size:11px; text-align:center;">
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Stock Actual</th>
                                    <th>Cantidad</th>
                                    <th>Restar <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="bottom"  data-original-title="Marque Check si la Cantidad se va Restar de su Stock Actual"></i></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:11px;  text-align:center;">
                                <tr>
                                    <td>Cavitine-Cemento de Obturación de 38gr</td>
                                    <td>20</td>
                                    <td>15</td>
                                    <td>1</td>
                                    <td><input type="checkbox" id="dismunir_inventario"></td>
                                    <td><div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-outline-info  btn-sm item_edit_p '><i class='fa fa-edit'></i></button> <button class='btn btn-outline-danger btn-sm item_delete_p'><i class='fa fa-trash'></i></button></div></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
               <!--Fin Tabla de Productos para Kit-->

                <div class="row mt-2">
					<div class="col-md-3 ml-3">
						<label style="color:#888;">Total items:</label>
					</div>
					<div class="col-md-4">
						<span style="color:#888;" id="total_items">S/. 0.00</span>
					</div>
				</div>
                <!--Fin Total de Items-->

                <div class="row mt-2">
                    <div class="col-md-3 ml-3">
                        <p class="text-muted font-14 mb-3">Precio de Venta:</p>
                    </div>
                    <div class="col-md-3">
                        <input type="number" step=".01" type class="form-control input-sm input-h" id="PrecioVentaKit" name="PrecioVentaKit" required="required">
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-checkbox ml-0">
                                <input type="checkbox" class="custom-control-input" id="IdTipoPrecio" name="IdTipoPrecio" value="2">
                                <label class="custom-control-label lt-m" for="IdTipoPrecio">Incluye IGV</label>
                        </div>
                    </div>
                    <div class=col-md-2>
                        <a href="#" id="ver_mas" style="font-size:12px;" value="1">Ver Mas</a>
                    </div>
                </div>
                <!--Fin de Precio de Venta-->
                <hr style="color:#888;" class="ocultar">
                <div class="row ocultar">
                    <div class="col-md-3 ml-3">
                        <p class="text-muted font-14 mb-3">Nombre Comercial:</p>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend">                                                            
                                <span class="input-group-text">
                                     <input type="checkbox"  id="CheckComercial" data-toggle="tooltip" data-placement="bottom"  data-original-title="Igualar al Nombre Original">
                                </span>                                                           
                            </div>
                            <input type="text" class="form-control input-sm input-h" id="NombreComercialKit" name="NombreComercialKit">
                        </div>
                    </div>
                </div>
                <!--Fin de Nombre Comercial-->

                <div class="row ocultar">
                    <div class="col-md-3 ml-3">
                        <p class="text-muted font-14 mb-3">Imagen:</p>
                    </div>
                    <div class="col-md-8">
                       <input type="file" id="Foto" name="Foto" accept="image/png, image/jpeg" style="font-size:11px;">
                    </div>
                </div>
                <!--Fin Foto-->

            </div>
            <div class="modal-footer">
                <button id="submit_enviar" type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>