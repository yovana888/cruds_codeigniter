<?php

namespace App\Bussiness;

use App\Models\mMarca;
use App\Validations\vMarca;


class bMarca
{
      public function __construct()
      {
          $this->marca = new mMarca();
          $this->validarmarca = new vMarca();
      }

      public function obtenerMarcas()
      {
          $resultado =  $this->marca->obtenerMarcas();
          return $resultado;
      }

      public function registrarMarca($data)
      { 
          $validacion = $this->validarmarca->validarCamposMarca($data);
          if($validacion ==='error'){
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->marca->insertarMarca($data);
            return $resultado; 
          }
      }

      public function editarMarca($id)
      {
        $resultado = $this->marca->mostrarMarca($id);
        return $resultado;
      }

      public function modificarMarca($post)
      {
          $validacion = $this->validarmarca->validarCamposMarca($post);
          if ($validacion === 'error') {
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->marca->actualizarMarca($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdMarca' => $id,
          'EstadoMarca' => $estado
        ];
        $resultado = $this->marca->actualizarMarca($data);
        return $resultado;
      }

      
}
