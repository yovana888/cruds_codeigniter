<?php

namespace App\Bussiness;
use App\Models\mKitProducto;
use App\Operaciones\oObtenerCodigoProducto;

class bKitProducto
{
      public function __construct()
      {
          $this->kitproducto = new mKitProducto();
          $this->obtenercodigo = new oObtenerCodigoProducto();
      }

      public function obtenerKits()
      {
          $resultado =  $this->kitproducto->obtenerKits();
          return $resultado;
      }

      public function obtenerFamilias()
      {
          $resultado = $this->kitproducto->obtenerFamilias();
          return $resultado;
      }

      public function obtenerMarcas()
      {
          $resultado = $this->kitproducto->obtenerMarcas();
          return $resultado;
      }

      public function obtenerUnidadMedida()
      {
          $resultado =  $this->kitproducto->obtenerUnidadMedida();
          return $resultado;
      }

      public function generarCodigoMarca($iniciales_marca)
      {
        $resultado = $this->obtenercodigo->generarCodigoMarca($iniciales_marca);
        return $resultado;
      }


      public function generarCodigoFamilia($iniciales_familia)
      {
        $resultado = $this->obtenercodigo->generarCodigoFamilia($iniciales_familia);
        return $resultado;
      }

      public function generarCodigoNumerico()
      {
        $resultado = $this->obtenercodigo->generarCodigoNumerico();
        return $resultado;
      }  

     
      
}
