<?php
namespace App\Bussiness;

use App\Models\mNotaSalida;
//
class bNotaSalida
{
      public function __construct()
      {
          $this->notasalida = new mNotaSalida();
          //$this->validarmarca = new vMarca();
      }

      public function obtenerNotasSalida()
      {
          $resultado =  $this->notasalida->obtenerNotasSalida();
          return $resultado;
      }
      
      public function obtenerUnidadMedida()
      {
          $resultado =  $this->notasalida->obtenerUnidadMedida();
          return $resultado;
      }
        
      public function obtenerListadoSede()
      {
          $resultado =  $this->notasalida->obtenerListadoSede();
          return $resultado;
      } 

      public function obtenerTipoNotaSalida()
      {
          $resultado = $this->notasalida->obtenerTipoNotaSalida();
          return $resultado;
      }

      public function obtenerMoneda()
      {
        $resultado = $this->notasalida->obtenerMoneda();
        return $resultado;
      }

      public function obtenerTipoDocumento()
      {
        $resultado = $this->notasalida->obtenerTipoDocumento();
        return $resultado;
      }

      
}
