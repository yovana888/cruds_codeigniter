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
            <a href="persona">Persona</a>
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
                    <h4 class="card-title">Listado de Personas
                        <a href="#" class="btn btn-danger btn-link ml-2" data-toggle="modal"
                            data-target="#modal_reporte">
                            <span class="btn-label">
                                <i class="fas fa-file-invoice"></i>
                            </span>
                            REPORTES
                        </a>
                    </h4>
                    <button class="btn btn-primary btn-round ml-auto"
                        onClick="$('#envio_search').trigger('reset'); $('.div-ruc').hide(); $('.ocultar').hide(); $('.datos-ruc').prop('required', false); $('.form-group').removeClass('has-error');$('#NumeroDocumentoIdentidad').attr('maxlength','8'); $('#NumeroDocumentoIdentidad').attr('placeholder', 'DNI (8 DIGITOS)'); $('.NombreCompleto' ).show();  $('.ApellidoCompleto' ).show(); $('.RepresentanteLegal' ).hide();  $('#txt-datos-personales').text('Datos de la Persona'); $('#imgSalida').attr('src','assets/images/personas/persona.png');"
                        data-toggle="modal" data-target="#modal_persona">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </button>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable_persona" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo Documento</th>
                                <th scope="col">Num Documento</th>
                                <th scope="col">Nombre Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Cel-Telefono</th>
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
<?php require '__modalReporte.php'; ?>
<?php require '__modalDetalles.php'; ?>
<?php require '__modalRazonSocial.php'; ?>
<?php require '__script.php'; ?>
<?php require '__scriptTabs.php'; ?>
<?php require '__scriptModal.php'; ?>
<?= $this->endSection() ?>