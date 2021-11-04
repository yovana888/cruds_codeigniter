<?php
namespace App\Operaciones;

class oObtenerSiguienteCodigo
{

   public function obtenerSiguienteCodigoUbigeoProvincia($id)
   {
        $db  = \Config\Database::connect();
        $cod_ubigeo=$db->table('provincia')->where('IdDepartamento',$id)->get();
        $num_provincias=count($cod_ubigeo->getResultArray());
        $cod_siguiente=$num_provincias+1;
        if($cod_siguiente<10){
            $cod_siguiente="0".$cod_siguiente;
        }
        return $cod_siguiente;
   }

   public function obtenerSiguienteCodigoUbigeoDistrito($id)
   {
        $db  = \Config\Database::connect();
        $cod_ubigeo=$db->table('distrito')->where('IdProvincia',$id)->get();
        $num_distritos=count($cod_ubigeo->getResultArray());
        $cod_siguiente=$num_distritos+1;
        if($cod_siguiente<10){
            $cod_siguiente="0".$cod_siguiente;
        }
        return $cod_siguiente;
   }


}