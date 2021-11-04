<script>
    $(document).ready(function() {

        //mostrar CodigoBarras
        $('body').on('click', '.item_barcode', function () {
        fila = $(this).closest("tr");
        const id = parseInt(fila.find('td:eq(0)').text());
            $.ajax({
                url: 'Producto/mostrarBarCode/'+id,
                type: "GET",
                dataType: 'json',
                success: function (data) {
                    $("#bc_NombreProducto").text(data.NombreProducto);
                    $("#input_barcode").val(data.CodigoBarraProducto);
                    generarBarCode();
                    $('#modal_codigobarra').modal('show');
                },
                error: function () {
                    alert("error peticion ajax");
                }
            });
        });
        //funcion generarcodigobarras con la libreria BarCodeJS
        function generarBarCode(){
            codigo_barcode=$("#input_barcode").val();
            formato=$('#formato').val();
            $("#barcode").empty();
            JsBarcode("#barcode",codigo_barcode,{
                        format:formato,
                        displayValue: true
            });
        }
        //Redibujar el codigo si hay un cambio en el select
        $('select#formato').on('change', function() {
            generarBarCode();
        });

        //imprimir codigodebarras
        $("#imprimir_barcode").click(function() {
            generarBarCode();

            let printElement = document.getElementById('svgDiv');
            var printWindow = window.open('', 'PRINT');
            printWindow.document.write(document.documentElement.innerHTML);
            setTimeout(() => { // Needed for large documents
            printWindow.document.body.style.margin = '0 0';
            printWindow.document.body.innerHTML = printElement.outerHTML;
            printWindow.document.close(); // necessary for IE >= 10
            printWindow.focus(); // necessary for IE >= 10*/
            printWindow.print();
            printWindow.close();
            }, 1000)

        });

    });

</script>