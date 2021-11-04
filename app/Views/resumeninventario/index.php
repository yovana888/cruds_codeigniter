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
            <a href="#">Inventario</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item active">
            <a href="#">Resumen Inventario</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <form class="form-inline">
                        <a href="#" class="btn btn-info btn-link ml-2" data-toggle="modal" data-target="#modal_importar"
                            onClick="$('#envio_importar').trigger('reset'); $('#div-error').hide();">
                            <span class="btn-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </span>
                            IMPORTAR INV. INICIAL
                        </a>

                        <a href="#" class="btn btn-secondary btn-link ml-2" data-toggle="modal"
                            data-target="#modal_importar_ajuste"
                            onClick="$('#envio_importar_ajuste').trigger('reset'); $('#div-error-ajuste').hide();">
                            <span class="btn-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </span>
                            IMPORTAR INV. AJUSTE
                        </a>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-round btn-link dropdown-toggle"
                                data-toggle="dropdown">
                                <i class="fas fa-building"></i> SEDE: <span class="selection">Ver por Todo</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" value="0" href="#">Ver por Todo</a></li>
                                <?php foreach ($sede as $row) : ?>
                                <li><a class="dropdown-item" value="<?php echo $row->IdSede; ?>"
                                        href="#"><?php echo $row->NombreSede; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <input type="date" id="FechaInventarioParametro"
                            class="form-control form-control-sm col-xs-3 col-md-2.5">

                    </form>
                    <button class="btn btn-primary btn-round ml-auto"
                        onClick="$('#envio_resumen').trigger('reset'); $('#detalles tbody tr').remove();"
                        data-toggle="modal" data-target="#modal_resumen">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_resumen" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Sede</th>
                                <th scope="col">Tipo Inventario</th>
                                <th scope="col">Fecha Inventario</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="mostrartabla"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '__modal.php'; ?>
<?php require '__modalEdit.php'; ?>
<?php require '__DetalleInventario.php'; ?>
<?php require '__modalInventario.php'; ?>
<?php require '__modalDelete.php'; ?>
<?php require '__Importar.php'; ?>
<?php require '__ImportarAjuste.php'; ?>
<?php require '__script.php'; ?>
<?php require '__scriptModal.php'; ?>
<?= $this->endSection() ?>