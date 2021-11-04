<?php
namespace App\Validations;

class vTipoDocumento
{    

    public function duplicadoTipoDocumento($data)
    {
        $db  = \Config\Database::connect();
        $CodigoTipoDocumento = $data['CodigoTipoDocumento'];
        $NombreTipoDocumento = $data['NombreTipoDocumento'];
        $NombreAbreviado  = $data['NombreAbreviado'];         
        if(empty($data['IdTipoDocumento'])){
        	$validacion= $db->table('tipodocumento')->where('NombreTipoDocumento',$NombreTipoDocumento)
       		->orWhere('NombreAbreviado', $NombreAbreviado)->orWhere('CodigoTipoDocumento', $CodigoTipoDocumento)->get();
        }else{
        	$id =	$data['IdTipoDocumento'];
        	$validacion= $db->table('tipodocumento')->where('NombreTipoDocumento', $NombreTipoDocumento)
        	->where('IdTipoDocumento !=', $id)->orwhere('NombreAbreviado', $NombreAbreviado)
        	->where('IdTipoDocumento !=', $id)->orwhere('CodigoTipoDocumento', $CodigoTipoDocumento)
        	->where('IdTipoDocumento !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }     

}