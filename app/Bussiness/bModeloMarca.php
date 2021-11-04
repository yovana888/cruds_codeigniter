<?php

namespace App\Bussiness;

use App\Models\mModeloMarca;
use App\Validations\vModeloMarca;


class bModeloMarca
{
      public function __construct()
      {
          $this->modelomarca = new mModeloMarca();
          $this->validarmodelomarca = new vModeloMarca();
      }

      public function obtenerModelosMarca()
      {
          $resultado =  $this->modelomarca->obtenerModelosMarca();
          return $resultado;
      }

      public function obtenerMarcas()
      {
          $resultado =  $this->modelomarca->obtenerMarcas();
          return $resultado;
      }

      public function registrarModeloMarca($data)
      { 
          $validacion = $this->validarmodelomarca->validarCamposModeloMarca($data);
          if($validacion ==='error'){
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->modelomarca->insertarModeloMarca($data);
            return $resultado; 
          }
      }

      public function editarModeloMarca($id)
      {
        $resultado = $this->modelomarca->mostrarModeloMarca($id);
        return $resultado;
      }

      public function modificarModeloMarca($post)
      {
          $validacion = $this->validarmodelomarca->validarCamposModeloMarca($post);
          if ($validacion === 'error') {
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->modelomarca->actualizarModeloMarca($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdModeloMarca' => $id,
          'EstadoModeloMarca' => $estado
        ];
        $resultado = $this->modelomarca->actualizarModeloMarca($data);
        return $resultado;
      }

      
}
