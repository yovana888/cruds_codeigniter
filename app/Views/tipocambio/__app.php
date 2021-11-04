<script>
    function moneda_valor() {
        $('#texto_add1').text("");
        $('#texto_add2').text("");
        datosMoneda = document.getElementById('moneda_select').value.split('_');
        $("#gif").css("display", "block");
        $('#IdMonedaDestino').val(datosMoneda[0]);
        $("#TipoCambioCompra").val('');
        $("#TipoCambioVenta").val('');
        var monedaDestino = datosMoneda[0];
        var texto = datosMoneda[1];
        if (texto == 'USD') {
            $("#TipoCambioCompra").css("display", "block");
            $("#label-compra").css("display", "block");
            $.get('https://www.deperu.com/api/rest/cotizaciondolar.json', function(data) {
                $("#gif").css("display", "none");
                var dolar = Object.values(data.Cotizacion[0]);
                var compra = dolar[0];
                var venta = dolar[1];
                $('#TipoCambioCompra').val(compra);
                $('#TipoCambioVenta').val(venta);
            });
        } else {
            //ocultamos el input compra, pero igualmente asignamos el valor
            $("#TipoCambioCompra").css("display", "none");
            $("#label-compra").css("display", "none");
            
                $.get('https://openexchangerates.org/api/latest.json', {
                    app_id: '77b65aae37684479937fe8a41d04b274'
                }, function(data) {
                    $("#gif").css("display", "none");
                    venta = data.rates.PEN;
                    switch (texto) {
                        case 'CLP':
                            equivalente = data.rates.CLP;
                            break;
                        case 'EUR':
                            equivalente = data.rates.EUR;
                            break;
                        case 'JPY':
                            equivalente = data.rates.JPY;
                    }

                    moneda_convertida = venta / equivalente;
                    console.log(moneda_convertida);
                    redondeo1 = moneda_convertida.toFixed(4);
                    $('#TipoCambioCompra').val(redondeo1);
                    $('#TipoCambioVenta').val(redondeo1);
                    $('#texto_add1').text("1 " + texto + " equivale => " + redondeo1 + " SOLES");
                   

                });
            
        }

    }
</script>