<?= $this->extend('layouts/main') ?>
<?= $this->section('contenido') ?>

<div class="page-header">
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="resumeninventario">Inventario</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="notasalida">Nota Salida</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> <span id="txt-nota" class="badge badge-secondary">Nuevo Inventario</span>
                        <a href="notasalida" class="btn btn-primary btn-link ml-2" id="pdf">
                            <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                            Volver
                        </a>
                    </h4>
                </div>
            </div>

            <div class="card-body" style="margin-left: 1em;margin-right: 1em">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Sede o Almacen Salida<span
                                    class="required-label">*</span></label>
                            <div class="col-md-8 col-xs-12">
                                <select class="form-control form-control-sm" id="IdSede" name="IdSede" required="">
                                    <option value="">-Seleccione-</option>
                                    <?php foreach ($sede as $row) : ?>
                                    <option value="<?php echo $row->IdSede; ?>"><?php echo $row->NombreSede; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Serie/Numero</label>
                            <div class="col-md-8 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="span-serie">SERIE</span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="Numero" name="Numero">
                                    <input type="text" hidden name="Serie">

                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-count btn-sm " title="Agregar Serie"><i
                                                class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Tipo Salida<span
                                    class="required-label">*</span></label>
                            <div class="col-md-8 col-xs-12">
                                <div class="input-group">
                                    <select class="form-control form-control-sm" id="IdTipoNotaSalida"
                                        name="IdTipoNotaSalida">
                                        <?php foreach ($tiponotasalida as $row) : ?>
                                        <option value="<?php echo $row->IdTipoNotaSalida; ?>">
                                            <?php echo $row->Concepto; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-count btn-sm "
                                            title="Agregar Tipo Salida"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Fecha Salida<span
                                    class="required-label">*</span></label>
                            <div class="col-md-8 col-xs-12">
                                <input type="date" class="form-control form-control-sm" id="FechaSalida"
                                    name="FechaSalida" required>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Encargado Almacen<span
                                    class="required-label">*</span></label>
                            <div class="col-md-8 col-xs-12">

                                <div class="input-group">
                                    <select class="form-control form-control-sm" id="IdResponsableAlmacen"
                                        name="IdResponsableAlmacen">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-count btn-sm "
                                            title="Agregar Tipo Salida"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group row">
                            <label class="col-md-4 col-xs-12 text-right"><i class="fas fa-info-circle text-muted"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Por Ejemplo una Guia Remision, Venta, etc; que se encuentra registrado en el sistema, si no es el caso seleccione ninguno"></i>
                                Tipo Doc. Origen</label>
                            <div class="col-md-8 col-xs-12">
                                <select class="form-control form-control-sm" id="IdTipoDocumento"
                                    name="IdTipoDocumento">
                                    <?php foreach ($tipodocumento as $row) : ?>
                                    <option value="<?php echo $row->IdTipoDocumento; ?>">
                                        <?php echo $row->NombreTipoDocumento; ?></option>
                                    </option>
                                    <?php endforeach; ?>
                                    <option value="0">NINGUNO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Documento Origen</label>
                            <div class="col-md-8 col-xs-12">
                                <div class="input-group">
                                    <input type="text" hidden name="Num-Serie-Origen">
                                    <input type="text" class="form-control form-control-sm" id="Num-Serie-Origen"
                                        placeholder="Serie-Numero">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-count btn-sm "
                                            title="Buscar Documento en el Sistema"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Entregado a<span
                                    class="required-label">*</span></label>
                            <div class="col-md-8 col-xs-12">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" id="Cliente" name="Cliente"
                                        required placeholder="Ingrese el RUC o DNI">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-count btn-sm "
                                            title="Buscar por SUNAT o RENIEC"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Direccion Envio</label>
                            <div class="col-md-8 col-xs-12">
                                <input type="text" class="form-control form-control-sm" id="DireccionEnvio"
                                    name="DireccionEnvio">
                            </div>
                        </div>


                        <div class="form-group form-show-validation row">
                            <label class="col-md-4 col-xs-12 text-right">Moneda</label>
                            <div class="col-md-8 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select class="form-control form-control-sm" id="IdMoneda" name="IdMoneda">
                                            <?php foreach ($moneda as $row) : ?>
                                            <option value="<?php echo $row->CodigoMoneda; ?>">
                                                <?php echo $row->CodigoMoneda; ?></option>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="TipoCambio"
                                        name="TipoCambio" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-link btn-xs"
                                            title="Agregar Otros Documentos de Referencia">+ Otros Adjuntos</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="separator-solid"></div>

                <div class="row">
                    <h4 class="text-primary ml-2">Detalle Inventario</h4>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-xs-12">
                        <label>Producto <span class="required-label">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" autocomplete="off" id="Producto"
                                placeholder="Ingrese el Codigo o Nombre del Producto">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-count btn-sm "><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 col-xs-12">
                        <label><b id="txt-stock" class="text-primary">Stock Actual: 8</b></label>
                        <div class="input-group">
                            <select class="form-control form-control-sm" id="UnidadMedida" name="UnidadMedida">
                                <option value="58">Unidad</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-3 col-xs-12">
                        <label>Cantidad</label>
                        <div class="input-group">
                            <input type="number" class="form-control form-control-sm" id="Producto">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary btn-sm "><i class="fas fa-plus"></i>
                                    Agregar</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-xs-12">
                        <input type="text" hidden id="IdProductoTemporal">
                        <div class="table-responsive">
                            <table class="table" style="font-size: 10px;" id="detalles">
                                <thead>
                                    <tr>
                                        <th>-</th>
                                        <th>Nombre Producto</th>
                                        <th>Unidad Med.</th>
                                        <th>Stock Actual</th>
                                        <th>Cantidad-Salida</th>
                                        <th>CostoUnit</th>
                                        <th>Importe</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="separator-solid"></div>

                <div class="row">
                    <div class="form-group col-md-12 col-xs-12">
                        <h3 class="text-primary" id="total" style="text-align: right;">Total: 0</h3>
                        <h4 class="text-muted" id="total_cantidad" style="text-align: right;">Total Cantidad: 0</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-8 col-xs-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Observacion</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="Observacion" name="Observacion">
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-xs-12">
                        <button type="submit" class="btn btn-sm btn-primary float-right ml-1"><i
                                class="fas fa-save"></i> Generar Nota </button>
                        <button type="button" class="btn btn-border btn-sm btn-primary float-right ml-1"><i
                                class="fas fa-save"></i> Borrador</button>
                        <button type="button"
                            class="btn btn-border btn-sm btn-primary float-right ml-1">Limpiar</button>
                        <i class="fas fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="top"
                            title="La Opcion Generar Nota, guarda la nota y no se puede realizar una modificacion posterior, en cambio si se guarda como borrador si podra editarlo"></i>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('template_modal/newSerie.php');?>
<?php require '__scriptView.php'; ?>
<?= $this->endSection() ?>