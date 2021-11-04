<?php
namespace App\Validations;

class vRol
{    
    public function validarCamposRol($data)
    {
        $db  = \Config\Database::connect();
        $NombreRol = $data['NombreRol'];

        if(empty($data['IdRol'])){
        	$validacion= $db->table('rol')->where('NombreRol',$NombreRol)->get();
        }else{
        	$id =	$data['IdRol'];
        	$validacion= $db->table('rol')->where('NombreRol',$NombreRol)
            ->where('IdRol !=', $id)->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        
        return $mensaje;
    
    }
}