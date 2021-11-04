<?php

namespace App\Bussiness;

use App\Models\mDistrito;
use App\Validations\vDistrito;
use App\Operaciones\oObtenerSiguienteCodigo;

class bDistrito
{
      public function __construct()
      {
          $this->distrito = new mDistrito();
          $this->validardistrito = new vDistrito();
          $this->obtenersiguientecodigo = new oObtenerSiguienteCodigo();
      }

      public function obtenerDistritos()
      {
          $resultado = $this->distrito->obtenerDistritos();
          return $resultado;
      }

      public function obtenerDepartamentos()
      {
          $resultado = $this->distrito->obtenerDepartamentos();
          return $resultado;
      }

      public function obtenerProvincias($id)
      {
          $resultado = $this->distrito->obtenerProvincias($id);
          return $resultado;
      }


      public function obtenerSiguienteCodigoUbigeo($id)
      {
        $resultado = $this->obtenersiguientecodigo->obtenerSiguienteCodigoUbigeoDistrito($id);
        return $resultado;
      }

      public function registrarDistrito($data)
      {
            $validacion = $this->validardistrito->validarCamposDistrito($data);
            if($validacion ==='error'){
              $validacion = "El codigo o el nombre ingresado debe ser unico. Intente con otros datos";
              return $validacion;
            }else{
              $resultado =  $this->distrito->insertarDistrito($data);
              return $resultado;
            }

      }

      public function editarDistrito($id)
      {
        $resultado = $this->distrito->mostrarDistrito($id);
        return $resultado;
      }

      public function modificarDistrito($post)
      {
          $validacion = $this->validardistrito->validarCamposDistrito($post);
          if ($validacion === 'error') {
            $validacion = "El codigo o el nombre ingresado debe ser unico. Intente con otro codigo";
            return  $validacion;
          } else {
            $resultado = $this->distrito->actualizarDistrito($post);
            return $resultado;
          }

      }       

      public function modificarIndicadorEstado($id,$estado){
          $data = [
            'IdDistrito' => $id,
            'IndicadorEstado' => $estado
          ];
          $resultado = $this->distrito->actualizarDistrito($data);
          return $resultado;
      }
}
