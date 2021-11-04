<?php
namespace App\Validations;

class vSubFamiliaProducto
{    

    public function validarDuplicado($data)
    {
        $db  = \Config\Database::connect();
        $NombreSubFamiliaProducto = $data['NombreSubFamiliaProducto'];                    
        if(empty($data['IdSubFamiliaProducto'])){
        	$validacion= $db->table('subfamiliaproducto')->where('NombreSubFamiliaProducto',$NombreSubFamiliaProducto)->get();
        }else{
        	$id = $data['IdSubFamiliaProducto'];
        	$validacion= $db->table('subfamiliaproducto')
            ->where('NombreSubFamiliaProducto', $NombreSubFamiliaProducto)->where('IdSubFamiliaProducto !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    } 
    
    public function validarImportacion($NombreSubFamiliaProducto,$IdFamiliaProducto){
        $db  = \Config\Database::connect();
        $validacion= $db->table('subfamiliaproducto')->select('IdSubFamiliaProducto')->like('NombreSubFamiliaProducto',$NombreSubFamiliaProducto)
        ->where('IdFamiliaProducto', $IdFamiliaProducto)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdSubFamiliaProducto;
            }
        }
        return $id;
    }

}