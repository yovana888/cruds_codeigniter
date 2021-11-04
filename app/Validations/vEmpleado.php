<?php
namespace App\Validations;

class vEmpleado
{    
    public function validarCamposEmpleado($data)
    {
        $db  = \Config\Database::connect();
        
        if(empty($data['IdPersona']) and empty($data['IdEmpleado'])){
            //Crear Ambos
            $NumeroDocumentoIdentidad=$data['NumeroDocumentoIdentidad'];
            $validacion_persona=$db->table('persona')->where('NumeroDocumentoIdentidad',$NumeroDocumentoIdentidad)->get();

            if($validacion_persona->getResultArray()==null){
                $mensaje='';
            }else{
                $mensaje='error-persona';
             }

        }else if(empty($data['IdEmpleado'])) {
            //Crear solo Empleado y editar algo de persona
        	$id =	$data['IdPersona'];
        	$validacion= $db->table('empleado')->where('IdPersona', $id)->get(); 
        
            if($validacion->getResultArray()==null){
                $mensaje='';
           
            }else{
                $mensaje='error-persona';
            }
        }else{
            //Editar ambos, ambos ya existen
            $NumeroDocumentoIdentidad=$data['NumeroDocumentoIdentidad'];
            $IdPersona = $data['IdPersona'];
            $validacion_persona=$db->table('persona')->where('NumeroDocumentoIdentidad',$NumeroDocumentoIdentidad)->where('IdPersona !=', $IdPersona)->get();
            
            if($validacion_persona->getResultArray()==null){
                $mensaje='';
           
            }else{
                $mensaje='error-persona';
            }
        }

        
        return $mensaje;
    
    }
}