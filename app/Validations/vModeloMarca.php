<?php
namespace App\Validations;

class vModeloMarca
{    
    public function validarCamposModeloMarca($data)
    {
        $db  = \Config\Database::connect();
        $IdMarca= $data['IdMarca'];
        $NombreModeloMarca = $data['NombreModeloMarca'];

        if(empty($data['IdModeloMarca'])){
            $validacion= $db->table('modelomarca')->where('NombreModeloMarca',$NombreModeloMarca)
            ->where('IdMarca', $IdMarca)->get();
        }else{
        	$id =	$data['IdModeloMarca'];
        	$validacion= $db->table('modelomarca')->where('NombreModeloMarca',$NombreModeloMarca)
            ->where('IdMarca', $IdMarca)->where('IdModeloMarca !=', $id)->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }

    public function validarImportacion($NombreModeloMarca,$IdMarca){
        $db  = \Config\Database::connect();
        $validacion= $db->table('modelomarca')->select('IdModeloMarca')->like('NombreModeloMarca',$NombreModeloMarca)
        ->where('IdMarca', $IdMarca)->get();;
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdModeloMarca;
            }
        }
        return $id;
    }

}
