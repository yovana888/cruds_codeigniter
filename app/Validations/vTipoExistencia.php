<?php
namespace App\Validations;

class vTipoExistencia
{    
    public function validarCamposTipoExistencia($data){
        $db  = \Config\Database::connect();
        $NombreTipoExistencia = $data['NombreTipoExistencia'];
        $CodigoTipoExistencia  = $data['CodigoTipoExistencia'];
        if(empty($data['IdTipoExistencia'])){
        	$validacion= $db->table('tipoexistencia')->where('NombreTipoExistencia',$NombreTipoExistencia)
       		->orWhere('CodigoTipoExistencia', $CodigoTipoExistencia)->get();
        }else{
        	$id =	$data['IdTipoExistencia'];
        	$validacion= $db->table('tipoexistencia')->where('NombreTipoExistencia', $NombreTipoExistencia)
        	->where('IdTipoExistencia !=', $id)->orwhere('CodigoTipoExistencia', $CodigoTipoExistencia)
        	->where('IdTipoExistencia !=', $id)->get();
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }
}