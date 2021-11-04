<?php
namespace App\Validations;

class vSede
{    
    public function validarCamposSede($data)
    {
        $db  = \Config\Database::connect();
        $NombreSede = $data['NombreSede'];
        $CodigoSede =$data['CodigoSede'];

        if(empty($data['IdSede'])){
            $validacion= $db->table('sede')->where('NombreSede',$NombreSede)
            ->orWhere('CodigoSede',$CodigoSede)
            ->get();
        }else{
        	$id = $data['IdSede'];
        	$validacion= $db->table('sede')->where('NombreSede',$NombreSede)
            ->where('IdSede !=', $id)
            ->orWhere('CodigoSede',$CodigoSede)
            ->where('IdSede !=', $id)
            ->get();        
        }

        if($validacion->getResultArray()==null){
        	$mensaje='';
        }else{
        	$mensaje='error';
        }
        return $mensaje;
    }

    public function validarImportacion($NombreSede){
        $db  = \Config\Database::connect();
        $validacion= $db->table('sede')->select('IdSede')->where('NombreSede',$NombreSede)->get();
        if($validacion->getResultArray()==null){
        	$id='';
        }else{
            foreach($validacion->getResult() as $row) {
                $id=$row->IdSede;
            }
        }
        return $id;
    }
}
