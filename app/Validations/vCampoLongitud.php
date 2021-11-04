<?php
namespace App\Validations;

class vCampoLongitud
{
    public function validarLongitudMoneda($data)
    {         
        $CodigoMoneda = $data['CodigoMoneda'];
        $longitud = strlen($CodigoMoneda);    
         
        if($longitud>0){
            if($longitud==3){
                return true;
            }else{
                return false;
            }
             
        }else{
            return false;
        }         
    }  

}