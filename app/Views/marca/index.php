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
            <a href="#">Marca</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listado Marca
                        <a href="#" class="btn btn-danger btn-link ml-2" id="pdf">
                            <span class="btn-label">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            PDF
                        </a>
                        <a href="#" class="btn btn-success btn-link ml-2" id="xls">
                            <span class="btn-label">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            XLSX
                        </a>
                    </h4>
                    <button class="btn btn-primary btn-round ml-auto" onClick="$('#envio_search').trigger('reset'); "
                        data-toggle="modal" data-target="#modal_marca">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_marca" class="display table table-striped table-hover">
                        <thead>
                            <tr>
								<th scope="col">Id</th>
								<th scope="col">Nombre Marca</th>
								<th scope="col">Iniciales Marca NombreProducto</th>
								<th scope="col">Iniciales Marca CodigoProducto</th>
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
<?php require '__script.php'; ?>
<?= $this->endSection() ?>