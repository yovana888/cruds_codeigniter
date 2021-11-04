<div class="modal fade bd-example-modal-lg" id="modal_persona" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="envio_search">
                <div class="modal-header">
                    <h5 class="modal-title">Ventana Persona</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="IdPersona" name="IdPersona" hidden>
                    <div class="stepwizard  col-md-offset-3">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-info btn-circle">1</a>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-light btn-circle"
                                    disabled="disabled">2</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form role="form" action="" method="post">
                        <div class="row setup-content" id="step-1">
                            <div class="col-md-6 ml-4">
                                <p class="font-14 mb-0 ">Identificacion</p>
                                <hr width="50px" class="ml-0 line">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Tipo Persona<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <select class="form-control-sm custom-select" id='IdTipoPersona' name="IdTipoPersona">
                                                    <?php foreach ($tipopersona as $row) : ?>
                                                    <?php if ($row->IdTipoPersona == 2) : ?>
                                                    <option value="<?php echo $row->IdTipoPersona; ?>" selected ><?php echo $row->NombreTipoPersona; ?></option>
                                                    <?php else : ?>
                                                    <option value="<?php echo $row->IdTipoPersona; ?>"><?php echo $row->NombreTipoPersona; ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-primary btn-sm btn-h"
                                                            id="btn-IdTipoPersona" type="button"><i
                                                                class="fa fa-plus"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Tipo Persona-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Tipo Documento<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control-sm custom-select" id='IdTipoDocumentoIdentidad'
                                                name="IdTipoDocumentoIdentidad">
                                                <?php foreach ($tipodocumentoidentidad as $row) : ?>
                                                <?php if ($row->NombreAbreviado == 'DNI') : ?>
                                                <option value="<?php echo $row->IdTipoDocumentoIdentidad; ?>" selected><?php echo $row->NombreAbreviado; ?></option>
                                                <?php else : ?>
                                                <option value="<?php echo $row->IdTipoDocumentoIdentidad; ?>"><?php echo $row->NombreAbreviado; ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Tipo Documento-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Num Documento<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm input-h" required
                                                    id="NumeroDocumentoIdentidad" name="NumeroDocumentoIdentidad" maxlength='8' placeholder="DNI (8 DIGITOS)" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-primary btn-sm btn-h"
                                                            id="btn-buscardocumento" type="button"><i
                                                                class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Numero de Documento-->

                                <div class="form-group NombreCompleto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Nombres<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-sm input-h limpiar" id="NombreCompleto"
                                                name="NombreCompleto" value="">
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Nombres-->

                                <div class="form-group ApellidoCompleto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Apellidos<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-sm input-h  limpiar"
                                                id="ApellidoCompleto" name="ApellidoCompleto" value="">
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Apellidos-->
                                
                                <div class="form-group div-ruc RepresentanteLegal">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted lt">Representante Legal<code class="rq">*</code>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm input-h  limpiar"
                                                    id="RepresentanteLegal" name="RepresentanteLegal">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-primary btn-sm btn-h" id="btn-buscar-representante" type="button" data-toggle="tooltip" data-placement="bottom" data-original-title="Digite el DNI y presione aqui para buscar, caso contrario solo escriba el nombre"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!--Segunda Columna-->
                            <div class="col-md-5">
                                <p class="font-14 mb-2 " id="txt-datos-personales">Datos Personales</p>
                                <hr width="50" class="ml-0 line">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt">Genero<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-check-inline">
                                                <label class="form-check-label lt text-muted">
                                                    <input type="radio" class="form-check-input" id="rb-M"
                                                        name="IdGenero" value="2" checked>Masculino
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label lt text-muted">
                                                    <input type="radio" class="form-check-input" id="rb-F"
                                                        name="IdGenero" value="1">Femenino
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Codigo-->

                                <div class="form-group  mt-4">
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt">Fecha Nacimiento</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" name="FechaNacimiento" id="FechaNacmiento"
                                                class="form-control input-sm input-h">
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Fecha Nac-->

                                <div class="form-group" id="div-lugarNacimiento">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt" id="text-lugar">Lugar Nacimiento</p>
                                        </div>
                                        <div class="col-md-8">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input type="checkbox" id="CheckPais" data-toggle="tooltip"
                                                            data-placement="bottom"
                                                            data-original-title="Buscar otros paises">
                                                    </span>
                                                </div>
                                                <input type="text" name="LugarNacimiento" id="search" class=" typeahead form-control input-sm input-h" autocomplete="off">
                                            </div>
                                            <span id="msg-search" class="ocultar text-muted lt">No se encontro resultados</span>
                                        </div>
                                    </div>

                                </div>
                                <!--Fin Fecha Nac-->

 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt">Nacionalidad</p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="search" value="Peruana" name="Nacionalidad" id="Nacionalidad"
                                                class="form-control input-sm input-h">

                                        </div>
                                    </div>
                                </div>
                                <!--Fin Nacionalidad-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt">Estado Civil</p>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="IdEstadoCivil" id="IdEstadoCivil"
                                                class="form-control-sm custom-select">
                                                <?php foreach ($estadocivil as $row) : ?>
                                                <option value="<?php echo $row->IdEstadoCivil; ?>"><?php echo $row->NombreEstadoCivil; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Nacionalidad-->
                            </div>

                            <!--Datos del Contribuyente-->
                            <div class="col-md-11 ml-4 div-ruc">
                                <p class="font-14 mb-0 ">Datos del Contribuyente</p>
                                <hr width="50px" class="ml-0 line">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p class="text-muted mb-1 lt">Razon Social<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control input-sm input-h input-lh datos-ruc  limpiar"
                                                id="RazonSocial" name="RazonSocial" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Razon Social-->

                            <div class="col-md-11 ml-4 div-ruc divempresa">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p class="text-muted mb-1 lt">Direccion<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control input-sm input-h input-lh limpiar" id="DireccionEmpresa" name="DireccionEmpresa" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Direccion Empresa-->

                            <div class="col-md-6 ml-4 div-ruc">
                               <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Ubicacion Empresa<code class="rq">*</code>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-sm input-h  limpiar" name="UbicacionEmpresa" id="UbicacionEmpresa"  >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---Fin Representante Legal-->

                            <div class="col-md-5 div-ruc">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt">Estado Contribuyente<code class="rq">*</code>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-sm input-h  limpiar" name="EstadoContribuyente" id="EstadoContribuyente" value="ACTIVO" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Estado Contribuyente-->

                            <div class="col-md-6 ml-4 div-ruc">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Nombre Comercial<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input type="checkbox" id="CheckComercial" data-toggle="tooltip"
                                                            data-placement="bottom"
                                                            data-original-title="Igualar a la Razon Social">
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control input-sm input-h  limpiar"
                                                    id="NombreComercial" name="NombreComercial">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin Nombre Comercial-->

                            <div class="col-md-5 div-ruc">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-muted mb-1 lt">Condicion<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                           <input type="text" class="form-control input-sm input-h  limpiar"  name="CondicionContribuyente"  id="CondicionContribuyente" value="HABIDO">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Fin de Datos del Contribuyente-->

                            <div class="col-md-11 ml-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-line nextBtn btn-lg pull-right"
                                                type="button">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--FIN DEL PRIMER TAB-->

                        <div class="row setup-content" id="step-2">
                            <div class="col-md-6 ml-4">
                                <p class="font-14 mb-0 ">Contacto</p>
                                <hr width="50px" class="ml-0 line">
                                <div class="form-group DireccionPrincipal ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt" id="txt-direccion">Domicilio de la persona<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-sm input-h"
                                                id="DireccionPrincipal" name="DireccionPrincipal">
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Direccion-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Telefono Fijo<i class="mdi mdi-information i-info ml-2" data-toggle="tooltip" data-placement="right" data-original-title="Para el Telefono no es necesario escribir el codigo, solo basta con el numero por ejemplo (052)245034"></i>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="tel" class="form-control input-sm input-h" id="InputTelefono"
                                                name="InputTelefono">
                                            <input type="text" hidden id="TelefonoFijo" name="TelefonoFijo">
                                            <span id="valid-msg-tel" style="color:#00C900;" class="ocultar">✓ Valido</span>
                                            <span id="error-msg-tel" style="color:red;" class="ocultar"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Telefono-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Telefono Personal<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <input type="checkbox" id="CheckTelefono" data-toggle="tooltip"
                                                            data-placement="bottom"
                                                            data-original-title="Igualar al Telefono Fijo">
                                                    </span>
                                                </div>
                                                <input type="tel" class="form-control input-sm input-h"
                                                    id="TelefonoPersonal" name="TelefonoPersonal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Telefono Personal-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Celular<i
                                                    class="mdi mdi-information i-info ml-2" data-toggle="tooltip"
                                                    data-placement="right"
                                                    data-original-title="Para el Celular no es necesario escribir el codigo, solo basta con escribir el numero por ejemplo 956481926 "></i>
                                            </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control input-sm input-h" type="tel" placeholder=""
                                                id="InputCelular">
                                            <input type="text" hidden id="Celular" name="Celular">
                                            <span id="valid-msg-cel" style="color:#00C900;" class="ocultar">✓
                                                Valido</span>
                                            <span id="error-msg-cel" style="color:red;" class="ocultar"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Telefono Celular-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Email<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control input-sm input-h" id="Email"
                                                name="Email">
                                            <span id="valid-msg-em" style="color:#00C900;" class="ocultar">✓
                                                Valido</span>
                                            <span id="error-msg-em" style="color:red;" class="ocultar"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Email-->
                            </div>

                            <!--Segunda Columna-->
                            <div class="col-md-5">
                                <p class="font-14  mt-1">Otros Datos</p>
                                <hr width="50px" class="ml-0 line">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Rol<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <select class="form-control-sm custom-select" id='IdRol' name='IdRol'>
                                                    <?php foreach ($rol as $row) : ?>
                                                    <?php if ($row->IdRol == 22) : ?>
                                                    <option value="<?php echo $row->IdRol; ?>" selected><?php echo $row->NombreRol; ?></option>
                                                    <?php else : ?>
                                                    <option value="<?php echo $row->IdRol; ?>"><?php echo $row->NombreRol; ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-primary btn-sm btn-h" id="btn-Rol"
                                                            type="button"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Rol-->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="text-muted mb-1 lt">Observacion<code class="rq">*</code></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control input-sm input-h" id="Observacion"
                                                name="Observacion" value="-">
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Email-->

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
                                                    <img id="imgSalida" src="assets/images/personas/persona.png"
                                                        width="100" height="100" />
                                                    <input type="text" hidden id="NombreFoto" name="NombreFoto" value="persona.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Imagen-->
                                <button id="submit_enviar" type="submit" class="btn btn-primary ">Guardar</button>

                            </div>
                        </div>
                        <!--Fin Tab-->
                    </form>

                </div>
        </div>
    </div>
    </form>
</div>
</div>
