<script type="text/javascript">
    $(document).ready(function() {
        datatable_kitproducto= $('#datatable_kitproducto').DataTable({
            "ajax": {
                "url": "KitProducto/obtenerKits",
                "method": 'GET',
                "dataType": 'json',
                "dataSrc": ""
            },
            "columns": [
                {"data": "IdKitProducto"},
                {"data": "CodigoKit"},
                {
                    data: "Foto",
                    render: function(data) {
                        return "<img width='60px' height='60px' alt='" + data +
                            "' class='img-thumbnail' src='assets/images/kits/" + data + "'>";
                    }
                },
                {"data": "NombreKitProducto"},
                {"data": "NombreFamiliaProducto"},
                {"data": "NombreMarca"},
                {"data": "NombreUnidadMedida"},
                {
                    data: "IndicadorEstado",
                    render: function(data) {return estado_valor(data, 'span-estado');}
                },
                {
                    data: "IndicadorEstado",
                    render: function(data) {return estado_valor(data, 'btn-kit');}
                }
            ]
        });
     

    });
</script>