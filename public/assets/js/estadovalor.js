function estado_valor(estado, elemento) {
    if (estado == 'A' || estado == '1') {
        switch (elemento) {
            case 'span-estado':
                var resultado = '<span class="badge badge-success badge-sm">Activo</span>';
                break;
            case 'btn-estado':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit' ><i class='fa fa-edit'></i></button><button type='button' title='Cambiar Estado' class='btn btn-link btn-danger btn-lg item_delete'><i class='fa fa-times'></i></button></div></div>";
                break;
            case 'btn-estado-2':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit' ><i class='fa fa-edit'></i><button class='btn btn-link btn-secondary btn-sm item_show' title='Detalles'><i class='fa fa-bars'></i></button</button><button type='button' title='Cambiar Estado' class='btn btn-link btn-danger btn-lg item_delete'><i class='fa fa-times'></i></button></div></div>";
                break;
            case 'btn-producto':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit'><i class='fa fa-edit'></i></button> <button type='button' class='btn btn-link btn-warning btn-lg item_inventario' title='Inventario'><i class='fa fa-cube'></i></button><button type='button'  class='btn btn-link btn-secondary btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button> <button class='btn btn-link btn-danger btn-lg item_delete'><i class='fa fa-times' ></i></button><button class='btn btn-link btn-default btn-lg item_barcode' title='Codigo de Barras'><i class='fas fa-barcode'></i></button></div></div>";
                break;
            case 'btn-kit':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit'><i class='fa fa-edit'></i></button><button class='btn btn-outline-primary btn-sm item_show' title='Detalles'><i class='fa fa-bars'></i></button> <button class='btn btn-link btn-danger btn-lg item_delete'><i class='fa fa-times' ></i></button><button class='btn btn-outline-secondary btn-sm item_barcode' title='Codigo de Barras'><i class='mdi mdi-barcode'></i></button></div></div>";
                break;
            case 'span-checked':
                var resultado = '<i class="fas fa-check-square" style="color:#1ecd97;"></i>';
                break;
            case 'btn-estado-modal':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit_modal'><i class='fa fa-edit'></i></button> <button class='btn btn-outline-primary btn-sm item_show_modal' title='Detalles'><i class='fa fa-bars'></i></button><button class='btn btn-link btn-danger btn-lg item_delete_modal'><i class='fa fa-times'></i></button></div></div>";
            case 'btn-persona':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit '><i class='fa fa-edit'></i></button><button class='btn btn-link btn-secondary btn-sm item_show' title='Detalles'><i class='fa fa-bars'></i></button><button class='btn btn-link btn-danger btn-lg item_delete'><i class='fa fa-times' ></i></button></div></div>";
                break;
            case 'btn-direccion':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit_direccion'><i class='fa fa-edit'></i></button><button class='btn btn-link btn-danger btn-lg item_delete_direccion'><i class='fa fa-times' ></i></button></div></div>";
                break;
            case 'btn-transportista':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg item_edit '><i class='fa fa-edit'></i></button><button class='btn btn-link btn-danger btn-lg item_delete'><i class='fas fa-times' ></i></button></div></div>";
                break;
            case 'btn-inventario':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg edit_inventario '><i class='fa fa-edit'></i></button><button class='btn btn-secondary btn-link btn-lg show_inventario' title='Detalles'><i class='fa fa-bars'></i></button> <button class='btn btn-link btn-danger btn-lg delete_inventario'><i class='fas fa-times' ></i></button></div></div>"
                break;
            case 'btn-historial':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar' class='btn btn-link btn-primary btn-lg show_historial'><i class='fa fa-bars'></i></button></div></div>";
                break;
            case 'btn-resumen':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button type='button' title='Editar'  class='btn btn-link btn-primary btn-lg item_edit '><i class='fas fa-edit'></i></button><button class='btn btn-secondary btn-link btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button><button class='btn btn-link btn-danger btn-lg item_delete'><i class='fa fa-times' ></i></button></div></div>";
                break;
        }

    } else if (estado == 'I' || estado == '0') {
        switch (elemento) {
            case 'span-estado':
                var resultado = '<span class="badge badge-count">Inactivo</span>';
                break;
            case 'btn-estado':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg item_restaurar'><i class='fas fa-redo-alt'></i></button></div></div>";
                break;
            case 'btn-estado-2':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg item_restaurar'><i class='fas fa-redo-alt'></i></button></div></div>";
                break;

            case 'btn-producto':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'> <button class='btn btn-link btn-secondary btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button><button class='btn btn-link btn-light btn-lg item_restaurar'><i class='mdi mdi-backup-restore'></i></button> </div></div>";
                break;
            case 'btn-kit':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'> <button class='btn btn-link btn-secondary btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button><button class='btn btn-link btn-light btn-lg item_restaurar'><i class='mdi mdi-backup-restore'></i></button> </div></div>";
                break;
            case 'span-checked':
                var resultado = '<i class="fas fa-minus-square" style="color:#b6babd;"></i>';
                break;
            case 'btn-estado-modal':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg item_edit_modal '><i class='fa fa-edit'></i></button> <button class='btn btn-outline-danger btn-sm item_delete_modal'><i class='fa fa-trash'></i></button></div></div>";
            case 'btn-persona':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-secondary btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button> <button class='btn btn-link btn-light btn-lg item_restaurar'><i class='mdi mdi-backup-restore'></i></button></div></div>";
                break;
            case 'btn-direccion':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg item_restaurar_direccion'><i class='mdi mdi-backup-restore'></i></button></div></div>";
                break;
            case 'btn-transportista':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg item_restaurar'><i class='mdi mdi-backup-restore'></i></button></div></div>";
                break;
            case 'btn-inventario':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'> <button class='btn btn-link btn-secondary btn-lg show_inventario' title='Detalles'><i class='fa fa-bars'></i></button></div></div>";
                break;
            case 'btn-historial':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg show_historial'><i class='fa fa-bars'></i></button></div></div>";
                break;
            case 'btn-resumen':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'> <button class='btn btn-link btn-light btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button></div></div>";
                break;
        }
    } else {

        switch (elemento) {
            case 'span-estado':
                var resultado = '<span class="badge badge-danger">Anulado</span>';
                break;
            case 'btn-inventario':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'> <button class='btn btn-link btn-light btn-lg show_inventario' title='Detalles'><i class='fa fa-bars'></i></button></div></div>";
                break;
            case 'btn-historial':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'><button class='btn btn-link btn-light btn-lg show_historial'><i class='fa fa-bars'></i></button></div></div>";
                break;
            case 'btn-resumen':
                var resultado = "<div class='text-center'><div class='btn-group btn-group-sm'> <button class='btn btn-link btn-light btn-lg item_show' title='Detalles'><i class='fa fa-bars'></i></button></div></div>";
                break;
        }
    }
    return resultado;
}