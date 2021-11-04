<script type="text/javascript">
//save marca
$("body").on("click", "#save_marca", function() {
    addEditRegistro('envio_marca', 'Marca/registrarMarca', luegoInsertarMarca);
});

function luegoInsertarMarca() {
    id_marca = $('#id_temporal').val();
    iniciales_nombre = $('#InicialesMarcaNombreProducto_add').val();
    iniciales_codigo = $('#InicialesMarcaCodigoProducto_add').val();
    nombre_marca = $('#NombreMarca_add').val();
    $('#IdMarca').val(id_marca);
    if (id_marca != '-') {
        $("#Select-IdMarca").prepend("<option value='" + id_marca + "_" + iniciales_nombre + "_" + iniciales_codigo + "' selected='selected'>" + nombre_marca + "</option>");
        $('select#IdModeloMarca').empty();
        $('select#IdModeloMarca').prepend('<option value=0>No Especificado</option>');
    }
    $('#modal_ventana_marca').modal('hide');
}

//save modelo
$("body").on("click", "#save_modelo", function() {
    addEditRegistro('envio_modelo', 'ModeloMarca/registrarModeloMarca', luegoInsertarModelo);
});

function luegoInsertarModelo() {
    id_modelo = $('#id_temporal').val();
    nombre_modelo = $('#NombreModeloMarca_add').val();
    if (id_modelo != '-') {
        $("#IdModeloMarca").prepend("<option value='" + id_modelo + "' selected='selected'>" + nombre_modelo + "</option>");
    }
    $('#modal_ventana_modelo').modal('hide');
}

//Save Familia
$("body").on("click", "#save_familia", function() {
    addEditRegistro('envio_familia', 'FamiliaProducto/registrarFamiliaProducto', luegoInsertarFamilia);
});

function luegoInsertarFamilia() {
    id_familia = $('#id_temporal').val();
    iniciales_nombre = $('#InicialesFamiliaNombreProducto_add').val();
    iniciales_codigo = $('#InicialesFamiliaCodigoNombreProducto_add').val();
    nombre_familia = $('#NombreFamiliaProducto_add').val();
    $('#IdFamiliaProducto').val(id_familia);
    if (id_familia != '-') {
        $("#Select-IdFamiliaProducto").prepend("<option value='" + id_familia + "_" + iniciales_nombre + "_" + iniciales_codigo + "' selected='selected'>" + nombre_familia + "</option>");
        $('select#IdSubFamiliaProducto').empty();
        $('select#IdSubFamiliaProducto').prepend('<option value=0>No Especificado</option>');
    }
    $('#modal_ventana_familia').modal('hide');
}

//Save SubFamilia
$("body").on("click", "#save_subfamilia", function() {
    addEditRegistro('envio_subfamilia', 'SubFamiliaProducto/registrarSubFamiliaProducto', luegoInsertarSubFamilia);
});

function luegoInsertarSubFamilia() {
    id_subfamilia = $('#id_temporal').val();
    nombre_subfamilia = $('#NombreSubFamiliaProducto_add').val();
    if (id_subfamilia != '-') {
        $("#IdSubFamiliaProducto").prepend("<option value='" + id_subfamilia + "' selected='selected'>" + nombre_subfamilia + "</option>");
    }
    $('#modal_ventana_subfamilia').modal('hide');
}

//Save Fabricante

$("body").on("click", "#save_fabricante", function() {
    addEditRegistro('envio_fabricante', 'Fabricante/registrarFabricante', luegoInsertarFabricante);
});

function luegoInsertarFabricante() {
    id_fabricante = $('#id_temporal').val();
    nombre_fabricante = $('#NombreFabricante_add').val();
    if (id_fabricante != '-') {
        $("#IdFabricante").prepend("<option value='" + id_fabricante + "' selected='selected'>" + nombre_fabricante + "</option>");
    }
    $('#modal_ventana_fabricante').modal('hide');
}

//Save Linea Producto

$("body").on("click", "#save_linea", function() {
    addEditRegistro('envio_linea', 'LineaProducto/registrarLineaProducto', luegoInsertarLinea);
});

function luegoInsertarLinea() {
    id_linea = $('#id_temporal').val();
    nombre_linea = $('#NombreLineaProducto_add').val();
    if (id_linea != '-') {
        $("#IdLineaProducto").prepend("<option value='" + id_linea + "' selected='selected'>" + nombre_linea + "</option>");
    }
    $('#modal_ventana_linea').modal('hide');
}

//------------------------------------------------------------------------------------------------------------
///Para abrir modales en producto

//Add Familia
$("body").on("click", "#btn-FamiliaProducto", function() {
    $('#envio_familia').trigger('reset');
    $('#modal_ventana_familia').modal('show');
});

//Add Marca
$("body").on("click", "#btn-Marca", function() {
    $('#envio_marca').trigger('reset');
    $('#modal_ventana_marca').modal('show');
});

//Add SubFamilia
$("body").on("click", "#btn-SubFamiliaProducto", function() {
    $('#NombreSubFamiliaProducto_add').val('');
    var id_familia = $('#IdFamiliaProducto').val();
    if (id_familia == 0) {
        alert('Para Agregar una SubFamilia, la Familia  debe ser diferente a  No Especificado');
    } else {
        $('#IdFamiliaProducto_add').val(id_familia);
        var nombre_familia = $('select[name="Select-IdFamiliaProducto"] option:selected').text();
        $('#NombreFamiliaProducto_add1').val(nombre_familia);
        $('#modal_ventana_subfamilia').modal('show');
    }

});

//Add Modelo
$("body").on("click", "#btn-ModeloMarca", function() {
    $('#NombreModeloMarca_add').val('');
    var id_marca = $('#IdMarca').val();
    if (id_marca == 0) {
        alert('Para Agregar un Modelo, la Marca  debe ser diferente a  No Especificado');
    } else {
        $('#IdMarca_add').val(id_marca);
        var nombre_marca = $('select[name="Select-IdMarca"] option:selected').text();
        $('#NombreMarca_add1').val(nombre_marca);
        $('#modal_ventana_modelo').modal('show');
    }
});

//Add Linea_Producto
$("body").on("click", "#btn-LineaProducto", function() {
    $('#envio_linea').trigger('reset');
    $('#modal_ventana_linea').modal('show');
});

//Add Fabricante
$("body").on("click", "#btn-Fabricante", function() {
    $('#envio_fabricante').trigger('reset');
    $('#modal_ventana_fabricante').modal('show');
});

//Add Servicio
$("body").on("click", "#btn-TipoServicio", function() {
    $('#envio_servicio').trigger('reset');
    $('#modal_ventana_tiposervicio').modal('show');
});
</script>