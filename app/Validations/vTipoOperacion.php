<?php
namespace App\Validations;

class vTipoOperacion
{    
    public function validarCamposTipoOperacion($data){
        $db  = \Config\Database::connect();
        $CodigoSunat = $data['CodigoSUNAT'];
        $CodigoTipoOperacion = $data['CodigoTipoOperacion'];
        $NombreTipoOperacion = $data['NombreTipoOperacion'];

        if(empty($data['IdTipoOperacion'])){
        	$validacion= $db->table('tipooperacion')->where('NombreTipoOperacion',$NombreTipoOperacion)
               ->orWhere('CodigoSUNAT', $CodigoSunat)
               ->orWhere('CodigoTipoOperacion', $CodigoTipoOperacion)->get();
        }else{
        	$id =	$data['IdTipoOperacion'];
            $validacion= $db->table('tipooperacion')->where('NombreTipoOperacion',$NombreTipoOperacion)
                ->where('IdTipoOperacion !=', $id)
                ->orwhere('CodigoTipoOperacion', $CodigoTipoOperacion)
                ->where('IdTipoOperacion !=', $id)
                ->orwhere('CodigoSUNAT', $CodigoSunat)
                ->where('IdTipoOperacion !=', $id)->get();
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;

    }
}