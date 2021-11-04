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
            <a href="producto">Producto</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item active">
            <a href="#">Listado</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title seccion_producto">Listado de Productos
                        <a href="#" class="btn btn-danger btn-link ml-2" data-toggle="modal"
                            data-target="#modal_reporte" onClick="$('.ocultar').hide();">
                            <span class="btn-label">
                                <i class="fas fa-file-invoice"></i>
                            </span>
                            REPORTES
                        </a>

                        <a href="#" class="btn btn-info btn-link ml-2" data-toggle="modal" data-target="#modal_importar"
                            id="importar" onClick="$('#envio_importar').trigger('reset');">
                            <span class="btn-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </span>
                            IMPORTAR
                        </a>

                        <a href="#" class="btn btn-secondary btn-link ml-2" data-toggle="modal"
                            data-target="#modal_resumen"
                            onClick="$('#envio_resumen').trigger('reset'); $('#detalles tbody tr').remove();">
                            <span class="btn-label">
                                <i class="fas fa-boxes"></i>
                            </span>
                            NUEVO INVENTARIO
                        </a>
                    </h4>

                    <h6 class="card-title seccion_inventario">
                        <span id="txt_producto"></span>
                        <a href="#" class="btn btn-info btn-link ml-2" id="volver">
                            <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                            Volver
                        </a>
                        <a href="#" class="btn btn-danger btn-link ml-2" id="pdf-inventario">
                            <span class="btn-label">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            PDF
                        </a>
                        <a href="#" class="btn btn-success btn-link ml-2" id="xls-inventario">
                            <span class="btn-label">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            XLSX
                        </a>
                    </h6>


                    <h6 class="card-title seccion_historial">
                        <p id="txt_producto-historial"></p>
                        <a href="#" class="btn btn-info btn-link ml-2" id="volver-historial">
                            <span class="btn-label">
                                <i class="fas fa-arrow-alt-circle-left"></i>
                            </span>
                            Volver
                        </a>
                    </h6>

                    <div class="form-group  seccion_producto">
                        <select id="IdSedeParametro" name="IdSede" class="form-control form-control-sm">
                            <option value="0" selected>Ver por Todas las Sedes</option>
                            <?php foreach ($sede as $row) : ?>
                            <option value="<?php echo $row->IdSede; ?>"><?php echo $row->NombreSede; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-round ml-auto  seccion_producto"
                        onClick="$('#envio_search').trigger('reset');$('select#IdFabricante').val(1);$('#IdSubFamiliaProducto').empty();$('#IdSubFamiliaProducto').prepend('<option value=0>No Especificado</option>');$('select#IdModeloMarca').empty();$('select#IdModeloMarca').prepend('<option value=0>No Especificado</option>');$('#imgSalida').attr('src','assets/images/productos/add-image.png');"
                        data-toggle="modal" data-target="#modal_producto">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </button>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive seccion_producto">
                    <table id="datatable_producto" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Familia</th>
                                <th scope="col">SubFamilia</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="table-responsive seccion_inventario">
                    <table id="datatable_inventario" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Unidad Medida</th>
                                <th>Stock</th>
                                <th>Cantidad Conteo</th>
                                <th>Diferencia</th>
                                <th>Costo Unit.</th>
                                <th>Costo Total</th>
                                <th>Sede</th>
                                <th>Fech_Inventario</th>
                                <th>Tipo_Inventario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <div class="table-responsive seccion_historial">
                    <table id="datatable_historial" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Unidad Medida</th>
                                <th>Stock</th>
                                <th>Cantidad Conteo</th>
                                <th>Diferencia</th>
                                <th>Costo Unit.</th>
                                <th>Costo Total</th>
                                <th>Sede</th>
                                <th>Fech_Inventario</th>
                                <th>Tipo_Inventario</th>
                                <th>Estado</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '__modal.php'; ?>
<?php require '__detalle.php'; ?>
<?php require '__codigobarra.php'; ?>
<?php require '__modalResumen.php'; ?>
<?php require '__modalInventario.php'; ?>
<?php require '__reporte.php'; ?>
<?php require '__script.php'; ?>
<?php require '__scriptTabs.php'; ?>
<?php require '__Importar.php'; ?>
<?php require '__scriptInventario.php'; ?>
<?php require '__modalDetallesInventario.php'; ?>
<?php require '__scriptModal.php'; ?>
<?php require '__scriptAddRegistro.php'; ?>
<?php require '__scriptCodigoBarras.php'; ?>
<?= $this->endSection() ?>