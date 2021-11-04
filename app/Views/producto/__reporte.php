<link href="assets/js/plugin/summernote/summernote-bs4.css" rel="stylesheet" />
<div class="modal fade bd-example-modal-lg" id="modal_reporte" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content" style="width: 100%;">
            <form id="procesar_reporte">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Reporte Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 ml-1">
                        <p class="font-14 mb-0 ">Tipo de Reporte</p>
                        <hr width="50px" class="ml-0 line">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-7">
                                    <select class="form-control-sm custom-select" id='IdReporte' name="IdReporte">
                                        <option value="TodoProducto">Todos los Campos</option>
                                        <option value="ProductoFabricante">Producto-Fabricante</option>
                                        <option value="ProductoFamiliaSubFamilia">Producto-Familia-SubFamilia</option>
                                        <option value="ProductoMarcaModelo">Producto-Marca-Modelo</option>
                                        <option value="ProductoPrecioUnidadMedida">Producto-Precio-Unidades</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-check-inline">
                                        <label class="form-check-label lt text-muted">
                                            <input type="radio" class="form-check-input" id="rb-pdf" name="rb-reporte"
                                                value="pdf" checked>PDF
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label lt text-muted">
                                            <input type="radio" class="form-check-input" id="rb-excel" name="rb-reporte"
                                                value="xlsx">EXCEL
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-7">
                                    <div class="form-check-inline my-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="CheckEmail">
                                            <label class="custom-control-label lt-m" for="CheckEmail">Enviar el Reporte
                                                por Correo?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="font-14 mt-2 ocultar">Enviar Email<i class="mdi mdi-information i-info ml-2"
                                    data-toggle="tooltip" data-placement="right"
                                    data-original-title="Para enviar a 2 o mas correos separalelos por comas ej: one@example.com,two@example.com"></i>
                            </p>
                            <hr width="50px" class="ml-0 line  ocultar">

                            <div class="row mt-2  ocultar">
                                <div class="col-md-3">
                                    <p class="text-muted mb-1 lt">Destinatario<code class="rq">*</code></p>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-sm input-h" id="EmailReceptor"
                                        name="EmailReceptor">
                                    <span id="valid-msg-receptor" style="color:#00C900;" class="span-ocultar">✓
                                        Valido</span>
                                    <span id="error-msg-receptor" style="color:red;" class="span-ocultar"></span>
                                </div>
                            </div>

                            <div class="row mt-2  ocultar">
                                <div class="col-md-3">
                                    <p class="text-muted mb-1 lt">Asunto<code class="rq">*</code></p>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-sm input-h" id="Asunto" name="Asunto">
                                </div>
                            </div>

                            <div class="row mt-3  ocultar">
                                <div class="col-md-12">
                                    <div class="summernote" id="mensaje">
                                    <?php foreach ($empresa as $row) : ?>
                                        <div style="background-color:#f9f9f9; margin: 0;padding: 0;">
                                        <div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">

                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top; border-collapse: collapse;">
                                                            <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">

                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">

                                                                    <tr>
                                                                        <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word; border-collapse: collapse; ">

                                                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="width:64px;border-collapse: collapse;">
                                                                                            <img height="auto" src='https://i.imgur.com/KO1vcE9.png' style="border:0;display:block;outline:none;text-decoration:none;width:100%; border: 0;height: auto;line-height: 100%;-ms-interpolation-mode: bicubic;" width="64" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;border-collapse: collapse; ">

                                                                            <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:18px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                                                                                 <?php echo $row->NombreComercial; ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;border-collapse: collapse; ">

                                                                            <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:18px;line-height:1;text-align:center;color:#555;">
                                                                                Un Titulo Genial...
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;border-collapse: collapse;">

                                                                            <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:20px;text-align:left;color:#7F8FA4;">
                                                                                Un Mensaje a Enviar
                                                                            </div>

                                                                        </td>
                                                                    </tr>

                                                                </table>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div style="Margin:0px auto;max-width:600px;">

                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                                <tbody>
                                                    <tr>
                                                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;border-collapse: collapse; ">
                                                        </td>

                                                        <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">

                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="vertical-align:bottom;padding:0;border-collapse: collapse; ">

                                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">

                                                                                <tr>
                                                                                    <td align="center" style="font-size:0px;padding:0;word-break:break-word;border-collapse: collapse;">

                                                                                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:12px;font-weight:300;line-height:1;text-align:center;color:#575757;">
                                                                                             <?php echo $row->DomicilioFiscal; ?>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td align="center" style="font-size:0px;padding:10px;word-break:break-word;border-collapse: collapse; ">

                                                                                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:12px;font-weight:300;line-height:1;text-align:center;color:#575757;">
                                                                                            <a href="#" style="color:#575757">Anular suscripción</a>
                                                                                        </div>

                                                                                    </td>
                                                                                </tr>

                                                                            </table>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    <?php break; ?>
                                    <?php endforeach; ?>
                                    </div>
                                    <!--Fin SummerNote-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="procesar" type="button" class="btn btn-info">Procesar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
    </form>
</div>
</div>