<?php
namespace App\Validations;

class vTipoPersona
{    
    public function validarCamposTipoPersona($data)
    {
        $db  = \Config\Database::connect();
        $NombreTipoPersona = $data['NombreTipoPersona'];

        if(empty($data['IdTipoPersona'])){
        	$validacion= $db->table('tipopersona')->where('NombreTipoPersona',$NombreTipoPersona)->get();
        }else{
        	$id =	$data['IdTipoPersona'];
        	$validacion= $db->table('tipopersona')->where('NombreTipoPersona',$NombreTipoPersona)
            ->where('IdTipoPersona !=', $id)->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        
        return $mensaje;
    
    }
}