<?php

namespace App\Bussiness;

use App\Models\mUnidadMedida;
use App\Validations\vUnidadMedida;


class bUnidadMedida
{
      public function __construct()
      {
          $this->unidadmedida = new mUnidadMedida();
          $this->validarunidadmedida = new vUnidadMedida();
      }

      public function obtenerUnidadesMedida()
      {
          $resultado =  $this->unidadmedida->obtenerUnidadesMedida();
          return $resultado;
      }

      public function registrarUnidadMedida($data)
      { 
          $validacion = $this->validarunidadmedida->validarCamposUnidadMedida($data);
          if($validacion ==='error'){
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->unidadmedida->insertarUnidadMedida($data);
            return $resultado; 
          }
      }

      public function editarUnidadMedida($id)
      {
        $resultado = $this->unidadmedida->mostrarUnidadMedida($id);
        return $resultado;
      }

      public function modificarUnidadMedida($post)
      {
          $validacion = $this->validarunidadmedida->validarCamposUnidadMedida($post);
          if ($validacion === 'error') {
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->unidadmedida->actualizarUnidadMedida($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdUnidadMedida' => $id,
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->unidadmedida->actualizarUnidadMedida($data);
        return $resultado;
      }

      
}
