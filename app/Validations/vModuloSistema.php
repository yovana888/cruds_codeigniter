<?php
namespace App\Validations;

class vModuloSistema
{    

    public function validarDuplicado($data)
    {
		$db  = \Config\Database::connect();
        $NombreModuloSistema = $data['NombreModuloSistema'];
        $AtajoModulo  = $data['AtajoModulo'];
        $UrlModulo  = $data['UrlModulo'];
        if(empty($data['IdModuloSistema'])){
        	$validacion= $db->table('modulosistema')->where('NombreModuloSistema',$NombreModuloSistema)
       		->orWhere('AtajoModulo', $AtajoModulo)->orWhere('UrlModulo', $UrlModulo)->get();
        }else{
        	$id =	$data['IdModuloSistema'];
        	$validacion= $db->table('modulosistema')->where('NombreModuloSistema', $NombreModuloSistema)
        	->where('IdModuloSistema !=', $id)->orwhere('AtajoModulo', $AtajoModulo)
        	->where('IdModuloSistema !=', $id)->get();
        }

        $respuesta = $validacion->getResultArray();
        if($validacion->getResultArray()==null){
        	return $mensaje=true;
        }else{
        	return $mensaje=false;
        }
        
    }     

}