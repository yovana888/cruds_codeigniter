<?php
namespace App\Validations;

class vGrupoParametro
{    

    public function validarDuplicado($data)
    {
        $db  = \Config\Database::connect();
        $NombreGrupoParametro = $data['NombreGrupoParametro'];
         
        if(empty($data['IdGrupoParametro'])){
        	$validacion= $db->table('grupoparametro')->where('NombreGrupoParametro',$NombreGrupoParametro)->get();
        }else{
        	$id =	$data['IdGrupoParametro'];
        	$validacion= $db->table('grupoparametro')->where('NombreGrupoParametro', $NombreGrupoParametro)
        	->where('IdGrupoParametro !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }     

}