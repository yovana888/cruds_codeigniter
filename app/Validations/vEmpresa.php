<?php
namespace App\Validations;

class vEmpresa
{    
    public function validarCamposEmpresa($data)
    {
        $db  = \Config\Database::connect();
        $RazonSocial = $data['RazonSocial'];
        $Codigo =$data['CodigoEmpresa'];

        if(empty($data['IdEmpresa'])){
            $validacion= $db->table('empresa')->where('RazonSocial',$RazonSocial)
            ->orWhere('CodigoEmpresa',$Codigo)
            ->get();
        }else{
        	$id =	$data['IdEmpresa'];
        	$validacion= $db->table('empresa')->where('RazonSocial',$RazonSocial)
            ->where('IdEmpresa !=', $id)
            ->orWhere('CodigoEmpresa',$Codigo)
            ->where('IdEmpresa !=', $id)
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
