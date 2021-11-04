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
            <a href="#">Configuracion</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-4 col-xs-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Empresa</h4>
            </div>
            <div class="card-body">
                <ul class="card-report-links">
                    <li class="card-category"><a href="empresa">Empresa</a></li>
                    <li class="card-category"><a href="sede">Sedes</a></li>
                    <li class="card-category"><a href="gironegocio">Giro Negocio</a></li>
                </ul>

            </div>
        </div>
    </div>

    <div class="col-md-4 col-xs-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sistema</h4>
            </div>
            <div class="card-body">
                <ul class="card-report-links">
                    <li class="card-category"><a href="modulosistema">Modulos Sistema</a></li>
                    <li class="card-category"><a href="grupoparametro">Grupo Parametros</a></li>
                    <li class="card-category"><a href="parametrosistema">Parametros Sistema</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xs-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Documentos</h4>
            </div>
            <div class="card-body">
                <ul class="card-report-links">
                    <li class="card-category"><a href="#">Listado de Documentos</a></li>
                    <li class="card-category"><a href="tipodocumento">Tipo Documento</a></li>
                    <li class="card-category"><a href="tipodocumentoidentidad">Tipo Documento Identidad</a></li>
                </ul>

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-4 col-xs-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sunat</h4>
            </div>
            <div class="card-body">
                <ul class="card-report-links">
                    <li class="card-category"><a href="unidadmedida">Listado de Unidades</a></li>
                    <li class="card-category"><a href="moneda">Listado de Moneda</a></li>
                    <li class="card-category"><a href="tipocambio">Listado Tipo de Cambio</a></li>
                    <li class="card-category"><a href="detracciones_conf">Detracciones</a></li>
                    <li class="card-category"><a href="percepciones_conf">Percepciones</a></li>
                    <li class="card-category"><a href="series">Series</a></li>
                    <li class="card-category"><a href="numeracion_facturacion">Numeracion Facturacion</a></li>
                    <li class="card-category"><a href="campos_adicionales">Campos adicionales Compra / Venta</a></li>
                    <li class="card-category"><a href="nota_predeterminada">Nota Predeterminada</a></li>
                </ul>

            </div>
        </div>
    </div>


    <div class="col-md-4 col-xs-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Otros</h4>
            </div>
            <div class="card-body">

                <ul class="card-report-links">
                    <li class="card-category"><a href="tipoexistencia">Tipo Existencia</a></li>
                    <li class="card-category"><a href="tipooperacion">Tipo Operacion</a></li>
                    <li class="card-category"><a href="tiposervicio">Tipo Servicio</a></li>
                    <li class="card-category"><a href="impuestos">Tipo Impuestos</a></li>
                    <li class="card-category"><a href="tipoactivo">Tipo Activo</a></li>
                    <li class="card-category"><a href="categoriaproducto">Categoria Producto</a></li>
                    <li class="card-category"><a href="regimentributario">Regimen Tributario</a></li>
                    <li class="card-category"><a href="igv_numceros">Igv y NumCeros</a></li>
                    <li class="card-category"><a href="formapago">Forma de Pago</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xs-2">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Plantillas</h4>
            </div>
            <div class="card-body">
                <ul class="card-report-links">
                    <li class="card-category"><a href="templatepdf">PDF</a></li>
                    <li class="card-category"><a href="templateguia">Guia Remision</a></li>
                    <li class="card-category"><a href="templatecorreo">Correo</a></li>
                </ul>

            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
<script>
$( "#" ).addClass( "myClass yourClass" );
</script>