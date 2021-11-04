<?php
namespace App\Validations;
class vProducto
{    
    public function validarCamposProducto($data)
   
    {
        $db  = \Config\Database::connect();
        $NombreProducto = $data['NombreProducto'];
        $CodigoProducto  = $data['CodigoProducto'];

        if(empty($data['IdProducto'])){
            $validacion= $db->table('producto')->where('NombreProducto', $NombreProducto)
            ->orwhere('CodigoProducto', $CodigoProducto)->get();
        }else{
        	$IdProducto = $data['IdProducto'];
            $validacion=$db->table('Producto')->where('NombreProducto', $NombreProducto)
            ->where('IdProducto !=', $IdProducto)
            ->orwhere('CodigoProducto', $CodigoProducto)
            ->where('IdProducto !=', $IdProducto)->get();
            
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
            $mensaje='error';
        }
        return $mensaje;
    }

 
    public function validarImportacion($NombreProducto){
        $db  = \Config\Database::connect();
        $validacion= $db->table('producto')->select('IdProducto')->like('NombreProducto',$NombreProducto)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdProducto;
            }
        }
        return $id;
    }
    
}