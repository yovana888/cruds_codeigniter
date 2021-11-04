<?php
namespace App\Validations;

class vMarca
{    
    public function validarCamposMarca($data)
    {
        $db  = \Config\Database::connect();
        $NombreMarca = $data['NombreMarca'];
        $InicialesMarcaCodigoProducto =$data['InicialesMarcaCodigoProducto'];

        if(empty($data['IdMarca'])){
            $validacion= $db->table('marca')->where('NombreMarca',$NombreMarca)
            ->orWhere('InicialesMarcaCodigoProducto',$InicialesMarcaCodigoProducto)
            ->get();
        }else{
        	$id =	$data['IdMarca'];
        	$validacion= $db->table('marca')->where('NombreMarca',$NombreMarca)
            ->where('IdMarca !=', $id)
            ->orWhere('InicialesMarcaCodigoProducto',$InicialesMarcaCodigoProducto)
            ->where('IdMarca !=', $id)
            ->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }

    public function validarImportacion($NombreMarca){
        $db  = \Config\Database::connect();
        $validacion= $db->table('marca')->select('IdMarca')->like('NombreMarca',$NombreMarca)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdMarca;
            }
        }
        return $id;
    }
}
