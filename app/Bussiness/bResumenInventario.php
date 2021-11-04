<?php

namespace App\Bussiness;
use App\Models\mResumenInventario;
use App\Validations\vResumenInventario;
use App\Validations\vInventario;


class bResumenInventario
{
      public function __construct()
      {
          $this->resumen = new mResumenInventario();
          $this->validarinventario = new vResumenInventario();
          $this->validarduplicado = new vInventario();
      }

      public function obtenerResumenInventario($IdSede,$Fecha)
      {
          $resultado =  $this->resumen->obtenerResumenInventario($IdSede,$Fecha);
          return $resultado;
      }

      public function obtenerTipoInventario()
      {
        $resultado = $this->resumen->obtenerTipoInventario();
        return $resultado;
      }

      public function obtenerUnidadMedida()
      {
          $resultado =  $this->resumen->obtenerUnidadMedida();
          return $resultado;
      }

      public function obtenerFamilia()
      {
          $resultado =  $this->resumen->obtenerFamilia();
          return $resultado;
      }
        
      public function obtenerSede()
      {
          $resultado = $this->resumen->obtenerSede();
          return $resultado;
      }

      public function registrarResumenInventario($data)
      { 
          $resultado =  $this->resumen->insertarResumenInventario($data);
          return $resultado;   
      }

      public function editarResumenInventario($id)
      {
        $resultado = $this->resumen->mostrarResumenInventario($id);
        return $resultado;
      }

      public function editarInventario($id)
      {
        $resultado = $this->resumen->editarInventario($id);
        return $resultado;
      }

      public function modificarResumenInventario($data) //Actualiza solo datos del resumen
      {
          $resultado = $this->resumen->actualizarResumenInventario($data);
          return $resultado;
      }

      public function modificarInventario($data) //Actualiza solo datos del inventario
      {
          $validacion = $this->validarduplicado->validarCamposInventario($data);
          if($validacion ==='error'){
            $validacion = "La unidad de medida ingresada ya fue registrada para este producto en esta sede. Intente con otro";
            return $validacion; 
          }else{
            $resultado = $this->resumen->actualizarInventario($data);
            return $resultado; 
          } 
      }

      public function mostrarDetallesResumenInventario($id)
      {
        $resultado = $this->resumen->mostrarDetallesResumenInventario($id);
        return $resultado;
      }

      public function buscarProductoInventario($search)
      {
        $resultado = $this->resumen->buscarProductoInventario($search);
        return $resultado;
      }

      public function mostrarProductoResumen($id)  //id=IdResumenInventario
      {
        $resultado = $this->resumen->mostrarProductoResumen($id);
        return $resultado;
      }

      public function mostrarDetalleInventario($id)
      {
          $resultado = $this->resumen->mostrarDetalleInventario($id);
          return $resultado;
      }

      public function mostrarHistorialProductoInventario($IdInventario, $NombreSede)
      {
          $data=$this->validarinventario->extraerId($IdInventario,$NombreSede);
          $resultado = $this->resumen->mostrarHistorialProductoInventario($data);
          return $resultado;
      }

      public function mostrarDetalleHistorial($id)
      {
        $resultado = $this->resumen->mostrarDetalleHistorial($id);
          return $resultado;
      }

      public function modificarIndicadorEstado($id,$motivo)
      { //Esto es para resumen
        $data = [
          'IdResumenInventario'     => $id,
          'EstadoResumenInventario' => 0,
          'Observacion'             => $motivo,
        ];
        $resultado = $this->resumen->actualizarResumenInventario($data);
        return $resultado;
      }

      public function modificarIndicadorEstadoInventario($idinventario,$idresumen,$motivo)
      {
        $data = [
          'IdInventario'            => $idinventario,
          'IdResumenInventario'     => $idresumen,
          'EstadoInventario'        => 0,
          'Observacion'             => $motivo,
        ];
        $resultado = $this->resumen->actualizarInventario($data);
        return $resultado;
      }

      public function validarInventario($idproducto,$idsede,$idunidad)
      {
        $validacion = $this->validarinventario->validarInventario($idproducto,$idsede,$idunidad);
        return  $validacion;
      }

      
}
