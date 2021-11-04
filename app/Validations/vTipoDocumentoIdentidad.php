<?php
namespace App\Validations;

class vTipoDocumentoIdentidad
{    

    public function duplicadoTipoDocumentoIdentidad($data)
    {
        $db  = \Config\Database::connect();
        $CodigoDocumentoIdentidad = $data['CodigoDocumentoIdentidad'];
        $NombreTipoDocumentoIdentidad = $data['NombreTipoDocumentoIdentidad'];
        $NombreAbreviado  = $data['NombreAbreviado'];         
        if(empty($data['IdTipoDocumentoIdentidad'])){
        	$validacion= $db->table('tipodocumentoidentidad')->where('NombreTipoDocumentoIdentidad',$NombreTipoDocumentoIdentidad)
       		->orWhere('NombreAbreviado', $NombreAbreviado)->orWhere('CodigoDocumentoIdentidad', $CodigoDocumentoIdentidad)->get();
        }else{
        	$id =	$data['IdTipoDocumentoIdentidad'];
        	$validacion= $db->table('tipodocumentoidentidad')->where('NombreTipoDocumentoIdentidad', $NombreTipoDocumentoIdentidad)
        	->where('IdTipoDocumentoIdentidad !=', $id)->orwhere('NombreAbreviado', $NombreAbreviado)
        	->where('IdTipoDocumentoIdentidad !=', $id)->orwhere('CodigoDocumentoIdentidad', $CodigoDocumentoIdentidad)
        	->where('IdTipoDocumentoIdentidad !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }     

}