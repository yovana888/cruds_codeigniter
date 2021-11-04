<?php
namespace App\Validations;

class vMoneda
{    
    public function validarCamposMoneda($data)
    {
        $db  = \Config\Database::connect();
        $CodigoMoneda = $data['CodigoMoneda'];
        $NombreMoneda = $data['NombreMoneda'];
         
        if(empty($data['IdMoneda'])){
            $validacion= $db->table('moneda')->where('CodigoMoneda',$CodigoMoneda)
            ->orWhere('NombreMoneda', $NombreMoneda)->get();
        }else{
        	$id =	$data['IdMoneda'];
        	$validacion= $db->table('moneda')->where('CodigoMoneda', $CodigoMoneda)
        	->where('IdMoneda !=', $id)->orWhere('NombreMoneda', $NombreMoneda)->where('IdMoneda !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }
}
