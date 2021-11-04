<?php
namespace App\Validations;

class vUnidadMedida
{    
    public function validarCamposUnidadMedida($data){
        $db  = \Config\Database::connect();
        $CodigoUnidadMedidaSunat  = $data['CodigoUnidadMedidaSunat'];
        $NombreUnidadMedida       = $data['NombreUnidadMedida'];
        $AbreviaturaUnidadMedida  = $data['AbreviaturaUnidadMedida'];
        
        if(empty($data['IdUnidadMedida'])){
        	$validacion= $db->table('unidadmedida')->where('NombreUnidadMedida',$NombreUnidadMedida)
               ->orWhere('CodigoUnidadMedidaSunat', $CodigoUnidadMedidaSunat)
               ->orWhere('AbreviaturaUnidadMedida', $AbreviaturaUnidadMedida)->get();
        }else{
        	$id = $data['IdUnidadMedida'];
            $validacion= $db->table('unidadmedida')->where('NombreUnidadMedida',$NombreUnidadMedida)
                ->where('IdUnidadMedida !=', $id)
                ->orWhere('CodigoUnidadMedidaSunat', $CodigoUnidadMedidaSunat)
                ->where('IdUnidadMedida !=', $id)
                ->orWhere('AbreviaturaUnidadMedida', $AbreviaturaUnidadMedida)
                ->where('IdUnidadMedida !=', $id)->get();
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }
}