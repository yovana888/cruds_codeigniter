<?php
namespace App\Validations;

class vPersona{
    public function validarCamposPersona($data)
    {
        $db  = \Config\Database::connect();
        $NumeroDocumentoIdentidad = $data['NumeroDocumentoIdentidad'];

        if(empty($data['IdPersona'])){
            $validacion= $db->table('persona')->where('NumeroDocumentoIdentidad',$NumeroDocumentoIdentidad)
            ->get();
        }else{
        	$id =	$data['IdPersona'];
        	$validacion= $db->table('persona')->where('NumeroDocumentoIdentidad',$NumeroDocumentoIdentidad)
            ->where('IdPersona !=', $id)
            ->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }

    public function validarCamposDireccion($data){
        $db  = \Config\Database::connect();
        $Direccion=$data['Direccion'];
        if(empty($data['IdDireccionPersona'])){
            $validacion= $db->table('direccionpersona')->where('Direccion',$Direccion)
            ->get();
        }else{
            $id=$data['IdDireccionPersona'];
            $validacion= $db->table('direccionpersona')->where('Direccion',$Direccion)
            ->where('IdDireccionPersona!=', $id)
            ->get();
        }  
        
        
        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;

    }
}