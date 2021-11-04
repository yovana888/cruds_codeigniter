<?php

namespace App\Bussiness;

use App\Models\mTipoCambio;

class bTipoCambio
{
      public function __construct()
      {
          $this->tipocambio = new mTipoCambio();
      }

      public function obtenerTiposCambio()
      {
          $resultado =  $this->tipocambio->obtenerTiposCambio();
          return $resultado;
      }

      public function obtenerMonedas()
      {
          $resultado = $this->tipocambio->obtenerMonedas();
          return $resultado;
      }

      public function registrarTipoCambio($data)
      { 
          $resultado =  $this->tipocambio->insertarTipoCambio($data);
          return $resultado; 
      }

      public function editarTipoCambio($id)
      {
        $resultado = $this->tipocambio->mostrarTipoCambio($id);
        return $resultado;
      }


      public function modificarTipoCambio($data,$Id)
      {
        $resultado = $this->tipocambio->actualizarTipoCambio($data,$Id);
        return $resultado;
      }

      public function modificarIndicadorEstado($id,$estado)
      {
        $data = [
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->tipocambio->actualizarTipoCambio($data,$id);
        return $resultado;
      }

      
}
