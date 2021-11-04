<?php

namespace App\Bussiness;

use App\Models\mTipoOperacion;
use App\Validations\vTipoOperacion;


class bTipoOperacion
{
      public function __construct()
      {
          $this->tipooperacion = new mTipoOperacion();
          $this->validartipooperacion = new vTipoOperacion();
      }

      public function obtenerTiposOperacion()
      {
          $resultado =  $this->tipooperacion->obtenerTiposOperacion();
          return $resultado;
      }

      public function registrarTipoOperacion($data)
      { 
          $validacion = $this->validartipooperacion->validarCampostipooperacion($data);
          if($validacion ==='error'){
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->tipooperacion->insertartipooperacion($data);
            return $resultado; 
          }
      }

      public function editarTipoOperacion($id)
      {
        $resultado = $this->tipooperacion->mostrartipooperacion($id);
        return $resultado;
      }

      public function modificarTipoOperacion($post)
      {
          $validacion = $this->validartipooperacion->validarCamposTipoOperacion($post);
          if ($validacion === 'error') {
            $validacion = "El nombre o el codigo ingresado ya esta en uso. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->tipooperacion->actualizarTipoOperacion($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
      
        $data = [
          'IdTipoOperacion' => $id,
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->tipooperacion->actualizarTipoOperacion($data);
        return $resultado;
      }

      
}
