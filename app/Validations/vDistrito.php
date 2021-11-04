<?php
namespace App\Validations;

class vDistrito
{    
    public function validarCamposDistrito($data)
    {

        $db  = \Config\Database::connect();
        $NombreDistrito = $data['NombreDistrito'];
        $IdProvincia = $data['IdProvincia'];
        $CodigoUbigeoDistrito  = $data['CodigoUbigeoDistrito'];

        if(empty($data['IdDistrito'])){
            $validacion= $db->table('distrito')->where('NombreDistrito', $NombreDistrito)
            ->where('IdProvincia', $IdProvincia)->orwhere('CodigoUbigeoDistrito', $CodigoUbigeoDistrito)
            ->where('IdProvincia', $IdProvincia)->get();
        }else{
            $IdDistrito = $data['IdDistrito'];
            $validacion=$db->table('distrito')->where('NombreDistrito', $NombreDistrito)
            ->where('IdProvincia =', $IdProvincia)->where('IdDistrito !=', $IdDistrito)
            ->orwhere('CodigoUbigeoDistrito', $CodigoUbigeoDistrito)
            ->where('IdProvincia =', $IdProvincia)->where('IdDistrito !=', $IdDistrito)->get();
        }

        if($validacion->getResultArray()==null){
            $mensaje='';
        }else{
            $mensaje='error';
        }
        return $mensaje;
    }
}
