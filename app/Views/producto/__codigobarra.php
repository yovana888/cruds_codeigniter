<div class="modal fade bd-example-modal-lg" id="modal_codigobarra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ventana Codigo de Barras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="text" id="input_barcode" hidden>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <span class="badge badge-success ml-2" id="bc_NombreProducto" ></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2 ml-2" id="formato" >
                            <option value="code128" selected>CODE128</option>  
                            <option value="code39">CODE39</option>
                            <option value="ean13">EAN-13</option>
                            <option value="ITF">ITF</option> 
                            <option value="MSI">MSI</option>
                            <option value="upc">UPC</option>     
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4" id="svgDiv">
                        <svg id="barcode"></svg>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button  id="imprimir_barcode" type="button" class="btn btn-info">Imprimir</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>

