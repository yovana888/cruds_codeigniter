<?php

namespace App\Bussiness;

use App\Models\mProvincia;
use App\Validations\vProvincia;
use App\Operaciones\oObtenerSiguienteCodigo;

class bProvincia
{
      public function __construct()
      {
          $this->provincia = new mProvincia();
          $this->validarprovincia = new vProvincia();
          $this->obtenersiguientecodigo = new oObtenerSiguienteCodigo();
      }

      public function obtenerProvincias()
      {
          $resultado =  $this->provincia->obtenerProvincias();
          return $resultado;
      }

      public function obtenerDepartamentos()
      {
          $resultado = $this->provincia->obtenerDepartamentos();
          return $resultado;
      }

      public function obtenerSiguienteCodigoUbigeo($id)
      {
        $resultado = $this->obtenersiguientecodigo->obtenerSiguienteCodigoUbigeoProvincia($id);
        return $resultado;
      }


      public function registrarProvincia($data)
      { 
          $validacion = $this->validarprovincia->validarCamposProvincia($data);
          if($validacion ==='error'){
            $validacion = "El codigo de ubigeo debe ser unico. Intente con otro codigo";
            return $validacion; 
          }else{
            $resultado =  $this->provincia->insertarProvincia($data);
            return $resultado; 
          }
      }

      public function editarProvincia($id)
      {
        $resultado = $this->provincia->mostrarProvincia($id);
        return $resultado;
      }

      public function modificarProvincia($post)
      {
          $validacion = $this->validarprovincia->validarCamposProvincia($post);
          if ($validacion === 'error') {
            $validacion = "El codigo de ubigeo debe ser unico. Intente con otro codigo";
            return  $validacion;
          } else {
            $resultado = $this->provincia->actualizarProvincia($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado)
      {
     
        $data = [
          'IdProvincia' => $id,
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->provincia->actualizarProvincia($data);
        return $resultado;
      }

      
}
