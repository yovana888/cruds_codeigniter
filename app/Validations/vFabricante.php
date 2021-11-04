<?php
namespace App\Validations;

class vFabricante
{    

    public function validarDuplicado($data)
    {
        $db  = \Config\Database::connect();
        $NombreFabricante = $data['NombreFabricante'];                 
        if(empty($data['IdFabricante'])){
        	$validacion= $db->table('fabricante')->where('NombreFabricante',$NombreFabricante)->get();
        }else{
        	$id = $data['IdFabricante'];
        	$validacion= $db->table('fabricante')->where('NombreFabricante', $NombreFabricante)
        	->where('IdFabricante !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }  
    

    public function validarImportacion($NombreFabricante){
        $db  = \Config\Database::connect();
        $validacion= $db->table('fabricante')->select('IdFabricante')->like('NombreFabricante',$NombreFabricante)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdFabricante;
            }
        }
        return $id;
    }

}