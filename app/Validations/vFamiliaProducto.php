<?php
namespace App\Validations;

class vFamiliaProducto
{    

    public function validarDuplicado($data)
    {
        $db  = \Config\Database::connect();
        $NombreFamiliaProducto = $data['NombreFamiliaProducto'];
        $InicialesFamiliaNombreProducto = $data['InicialesFamiliaNombreProducto'];  
        $InicialesFamiliaCodigoNombreProducto = $data['InicialesFamiliaCodigoNombreProducto'];               
        if(empty($data['IdFamiliaProducto'])){
        	$validacion= $db->table('familiaproducto')->where('NombreFamiliaProducto',$NombreFamiliaProducto)->orWhere('InicialesFamiliaNombreProducto',$InicialesFamiliaNombreProducto)->orWhere('InicialesFamiliaCodigoNombreProducto',$InicialesFamiliaCodigoNombreProducto)->get();
        }else{
        	$id = $data['IdFamiliaProducto'];
        	$validacion= $db->table('familiaproducto')
            ->where('NombreFamiliaProducto', $NombreFamiliaProducto)->where('IdFamiliaProducto !=', $id)
            ->orWhere('InicialesFamiliaNombreProducto', $InicialesFamiliaNombreProducto)->where('IdFamiliaProducto !=', $id)
            ->orWhere('InicialesFamiliaCodigoNombreProducto', $InicialesFamiliaCodigoNombreProducto)->where('IdFamiliaProducto !=', $id)
            ->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }  
    
    public function validarImportacion($NombreFamiliaProducto){
        $db  = \Config\Database::connect();
        $validacion= $db->table('familiaproducto')->select('IdFamiliaProducto')->like('NombreFamiliaProducto',$NombreFamiliaProducto)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdFamiliaProducto;
            }
        }
        return $id;
    }

}