<?php
namespace App\Validations;

class vGiroNegocio
{    
    public function validarCamposGiroNegocio($data)
    {
        $db  = \Config\Database::connect();
        $NombreGiroNegocio = $data['NombreGiroNegocio'];

        if(empty($data['IdGiroNegocio'])){
        	$validacion= $db->table('gironegocio')->where('NombreGiroNegocio',$NombreGiroNegocio)->get();
        }else{
        	$id =	$data['IdGiroNegocio'];
        	$validacion= $db->table('gironegocio')->where('NombreGiroNegocio',$NombreGiroNegocio)
            ->where('IdGiroNegocio !=', $id)->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }
}
