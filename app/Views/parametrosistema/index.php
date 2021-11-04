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
            <a href="configuracion">Configuracion</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item active">
            <a href="#">Parametro Sistema</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Listado de Parametro Sistema</h4>
                    <button class="btn btn-primary btn-round ml-auto" onClick="$('#envio_search').trigger('reset'); "
                        data-toggle="modal" data-target="#modalparametrosistema">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableparametrosistema" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Parametro de sistema</td>
                                <td>Valor</td>
                                <td>Grupo de parametro</td>
                                <td>Usuario registro</td>
                                <td>Fecha registro</td>
                                <td>Estado</td>
                                <td>Opciones</td>
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