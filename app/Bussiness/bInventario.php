<?php

namespace App\Bussiness;
use App\Models\mInventario;
use App\Validations\vInventario;


class bInventario
{
      public function __construct()
      {
          $this->inventario = new mInventario();
          $this->validarinventario = new vInventario();
      }

      public function mostrarInventario($id,$idsede)
      {
        $resultado =  $this->inventario->mostrarInventario($id,$idsede);
        return $resultado;
      }

      public function registrarInventario($data){
        $validacion = $this->validarinventario->validarCamposInventario($data);
        if($validacion ==='error'){
          $validacion = "La unidad de medida ingresada ya fue registrada para este producto en esta sede. Intente con otro";
          return $validacion; 
        }else{
          $resultado =  $this->inventario->insertarInventario($data);
          return $resultado; 
        }
      }
      public function obtenerUnidadMedida()
      {
          $resultado =  $this->inventario->obtenerUnidadMedida();
          return $resultado;
      }
        
      public function obtenerSede()
      {
          $resultado = $this->inventario->obtenerSede();
          return $resultado;
      }

      public function editarInventario($id)
      {
          $resultado = $this->inventario->editarInventario($id);
          return $resultado;
      }

      public function modificarInventario($data)
      {
          $validacion = $this->validarinventario->validarCamposInventario($data);
          if($validacion ==='error'){
            $validacion = "La unidad de medida ingresada ya fue registrada para este producto en esta sede. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->inventario->actualizarInventario($data);
            return $resultado; 
          } 
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdInventario' => $id,
          'EstadoInventario' => $estado
        ];
        $resultado = $this->inventario->actualizarInventario($data);
        return $resultado;
      }

      public function mostrarDetalleInventario($id){
        $resultado = $this->inventario-> mostrarDetalleInventario($id);
        return $resultado;
      }

      public function mostrarHistorial($id,$idsede){
        $resultado =  $this->inventario->mostrarHistorial($id,$idsede);
        return $resultado;
      }

}
