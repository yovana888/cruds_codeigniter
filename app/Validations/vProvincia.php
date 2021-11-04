<?php
namespace App\Validations;

class vProvincia
{    
    public function validarCamposProvincia($data)
   
    {

        $db  = \Config\Database::connect();
        $NombreProvincia = $data['NombreProvincia'];
        $IdDepartamento = $data['IdDepartamento'];
        $CodigoUbigeoProvincia  = $data['CodigoUbigeoProvincia'];

        if(empty($data['IdProvincia'])){
            $validacion= $db->table('provincia')->where('NombreProvincia', $NombreProvincia)
            ->where('IdDepartamento', $IdDepartamento)->orwhere('CodigoUbigeoProvincia', $CodigoUbigeoProvincia)
            ->where('IdDepartamento', $IdDepartamento)->get();
        }else{
        	$IdProvincia = $data['IdProvincia'];
            $validacion=$db->table('provincia')->where('NombreProvincia', $NombreProvincia)
            ->where('IdDepartamento =', $IdDepartamento)->where('IdProvincia !=', $IdProvincia)
            ->orwhere('CodigoUbigeoProvincia', $CodigoUbigeoProvincia)
            ->where('IdDepartamento =', $IdDepartamento)->where('IdProvincia !=', $IdProvincia)->get();
            

        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        return $mensaje;
    }

}