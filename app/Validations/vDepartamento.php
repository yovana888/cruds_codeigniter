<?php
namespace App\Validations;

class vDepartamento
{    
    public function validarCamposDepartamento($data)
    {
        $db  = \Config\Database::connect();
        $NombreDepartamento = $data['NombreDepartamento'];
        $CodigoUbigeoDepartamento  = $data['CodigoUbigeoDepartamento'];
        if(empty($data['IdDepartamento'])){
        	$validacion= $db->table('departamento')->where('NombreDepartamento',$NombreDepartamento)
       		->orWhere('CodigoUbigeoDepartamento', $CodigoUbigeoDepartamento)->get();
        }else{
        	$id =	$data['IdDepartamento'];
        	$validacion= $db->table('departamento')->where('NombreDepartamento', $NombreDepartamento)
        	->where('IdDepartamento !=', $id)->orwhere('CodigoUbigeoDepartamento', $CodigoUbigeoDepartamento)
        	->where('IdDepartamento !=', $id)->get();
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
