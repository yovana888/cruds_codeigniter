<?php
namespace App\Validations;

class vTransportista
{    
    public function validarCamposTransportista($data)
    {
        $db  = \Config\Database::connect();
        $NumeroLicenciaConducir = $data['NumeroLicenciaConducir'];
        
        if(empty($data['IdPersona']) and empty($data['IdTransportista'])){
            //Crear Ambos
            $NumeroDocumentoIdentidad= $data['NumeroDocumentoIdentidad'];
            $validacion_persona=$db->table('persona')->where('NumeroDocumentoIdentidad',$NumeroDocumentoIdentidad)->get();
        	$validacion_transp= $db->table('transportista')->where('NumeroLicenciaConducir',$NumeroLicenciaConducir)->get();

            if($validacion_persona->getResultArray()==null and $validacion_transp->getResultArray()==null){
                $mensaje='';
            }else if($validacion_persona->getResultArray()!=null){
                $mensaje='error-persona';
            }else{
                $mensaje='error-transportista';
            }

        }else if(empty($data['IdTransportista'])) {
            //Crear solo Transportista y editar algo de persona
        	$id =	$data['IdPersona'];
        	$validacion= $db->table('transportista')->where('IdPersona', $id)->get(); 
            $validacion_transp= $db->table('transportista')->where('NumeroLicenciaConducir',$NumeroLicenciaConducir)->get();     
            if($validacion->getResultArray()==null and $validacion_transp->getResultArray()==null){
                $mensaje='';
            }else if($validacion->getResultArray()!=null){
                $mensaje='error-persona';
            }else{
                $mensaje='error-licencia';
            }
        }else{
            //Editar ambos, ambos ya existen
            $IdPersona =	$data['IdPersona'];
            $IdTransportista = $data['IdTransportista'];
            $NumeroDocumentoIdentidad= $data['NumeroDocumentoIdentidad'];
            $validacion_persona=$db->table('persona')->where('NumeroDocumentoIdentidad',$NumeroDocumentoIdentidad)->where('IdPersona !=', $IdPersona)->get();
        	$validacion_transp= $db->table('transportista')->where('NumeroLicenciaConducir',$NumeroLicenciaConducir)->where('IdTransportista !=', $IdTransportista)->get();

            if($validacion_persona->getResultArray()==null and $validacion_transp->getResultArray()==null){
                $mensaje='';
            }else if($validacion_persona->getResultArray()!=null){
                $mensaje='error-persona';
            }else{
                $mensaje='error-transportista';
            }
        }

        
        return $mensaje;
    
    }
}