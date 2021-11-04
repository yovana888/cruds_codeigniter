<?php
namespace App\Validations;

class vLineaProducto
{    

    public function validarDuplicado($data)
    {
        $db  = \Config\Database::connect();
        $NombreLineaProducto = $data['NombreLineaProducto'];                 
        if(empty($data['IdLineaProducto'])){
        	$validacion= $db->table('lineaproducto')->where('NombreLineaProducto',$NombreLineaProducto)->get();
        }else{
        	$id = $data['IdLineaProducto'];
        	$validacion= $db->table('lineaproducto')->where('NombreLineaProducto', $NombreLineaProducto)
        	->where('IdLineaProducto !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }     

    public function validarImportacion($NombreLineaProducto){
        $db  = \Config\Database::connect();
        $validacion= $db->table('lineaproducto')->select('IdLineaProducto')->like('NombreLineaProducto',$NombreLineaProducto)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdLineaProducto;
            }
        }
        return $id;
    }

}