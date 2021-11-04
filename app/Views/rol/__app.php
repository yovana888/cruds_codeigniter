<script  type="text/javascript">
    function estado_valor(estado,elemento){
            if(estado=='A' || estado=='1'){
                switch (elemento) {
                    case 'checked':
                        var resultado='checked';
                        break;
                    case 'span':
                        var resultado='<span class="badge badge-success"><i class="mdi mdi-check"></i></span>';
                }

            }else{
                switch (elemento) {
                    case 'checked':
                       var resultado='';
                        break;
                    case 'span':
                        var resultado='<span class="badge badge-default"><i class="mdi mdi-close"></i></span>';
                }
            }
            return resultado;
        }

    function checkValor(id,checked)
    {
        if(checked == true) {
        document.getElementById(id).value = "1";
        } else {
        document.getElementById(id).value = "0";
        }
    }
      
</script>