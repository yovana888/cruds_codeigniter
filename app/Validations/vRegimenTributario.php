<?php
namespace App\Validations;

class vRegimenTributario
{    

    public function duplicadoRegimenTributario($data)
    {
        $db  = \Config\Database::connect();
        $NombreRegimenTributario = $data['NombreRegimenTributario'];
        $NombreAbreviado  = $data['NombreAbreviado'];         
        if(empty($data['IdRegimenTributario'])){
        	$validacion= $db->table('regimentributario')->where('NombreRegimenTributario',$NombreRegimenTributario)
       		->orWhere('NombreAbreviado', $NombreAbreviado)->get();
        }else{
        	$id =	$data['IdRegimenTributario'];
        	$validacion= $db->table('regimentributario')->where('NombreRegimenTributario', $NombreRegimenTributario)
        	->where('IdRegimenTributario !=', $id)->orwhere('NombreAbreviado', $NombreAbreviado)
        	->where('IdRegimenTributario !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }     

     

}