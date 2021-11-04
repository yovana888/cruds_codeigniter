<?php

namespace App\Bussiness;
use App\Models\mProducto;
use App\Validations\vProducto;
use App\Operaciones\oObtenerCodigoProducto;

class bProducto
{
      public function __construct()
      {
          $this->producto = new mProducto();
          $this->validarproducto = new vProducto();
          $this->obtenercodigo = new oObtenerCodigoProducto();
      }

      public function obtenerProductos($IdSede)
      {
          $resultado =  $this->producto->obtenerProductos($IdSede);
          return $resultado;
      }

      public function registrarProducto($data,$imagen)
      { 
          $validacion = $this->validarproducto->validarCamposProducto($data);
          if($validacion ==='error'){
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->producto->insertarProducto($data,$imagen);
            return $resultado; 
          }
      }

      public function obtenerFamilias()
      {
          $resultado = $this->producto->obtenerFamilias();
          return $resultado;
      }

      public function obtenerSubFamiliaProducto($id)
      {
          $resultado = $this->producto->obtenerSubFamiliaProducto($id);
          return $resultado;
      }

      public function obtenerModeloMarca($id)
      {
          $resultado = $this->producto->obtenerModeloMarca($id);
          return $resultado;
      }
      
      public function obtenerTipoInventario(){
        $resultado = $this->producto->obtenerTipoInventario();
        return $resultado;
      }

      public function obtenerLineas()
      {
          $resultado = $this->producto->obtenerLineas();
          return $resultado;
      }

      public function obtenerCategorias()
      {
          $resultado = $this->producto->obtenerCategorias();
          return $resultado;
      }

      public function obtenerExistencias()
      {
          $resultado = $this->producto->obtenerExistencias();
          return $resultado;
      }

      public function obtenerActivos()
      {
          $resultado = $this->producto->obtenerActivos();
          return $resultado;
      }

      public function obtenerServicios()
      {
          $resultado = $this->producto->obtenerServicios();
          return $resultado;
      }

      public function obtenerMarcas()
      {
          $resultado = $this->producto->obtenerMarcas();
          return $resultado;
      }

      public function obtenerFabricantes()
      {
          $resultado = $this->producto->obtenerFabricantes();
          return $resultado;
      }

      public function obtenerDatosEmpresa()
      {
          $resultado =  $this->producto-> obtenerDatosEmpresa();
          return $resultado;
      }

      public function obtenerUnidadMedida()
      {
          $resultado =  $this->producto->obtenerUnidadMedida();
          return $resultado;
      }
        
      public function obtenerSede()
      {
          $resultado = $this->producto->obtenerSede();
          return $resultado;
      }
      
      public function mostrarDetalles($id)
      {
          $resultado =  $this->producto->mostrarDetalles($id);
          return $resultado;
      }     

      public function mostrarBarCode($id)
      {
          $resultado =  $this->producto->mostrarBarCode($id);
          return $resultado;
      }

      public function generarCodigoMarca($iniciales_marca)
      {
        $resultado = $this->obtenercodigo->generarCodigoMarca($iniciales_marca);
        return $resultado;
      }


      public function generarCodigoFamilia($iniciales_familia)
      {
        $resultado = $this->obtenercodigo->generarCodigoFamilia($iniciales_familia);
        return $resultado;
      }

      public function generarCodigoNumerico()
      {
        $resultado = $this->obtenercodigo->generarCodigoNumerico();
        return $resultado;
      }   
      
      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdProducto' => $id,
          'EstadoProducto' => $estado
        ];
        $imagen='';
        $resultado = $this->producto->actualizarProducto($data,$imagen);
        return $resultado;
      }

      public function modificarIndicadorEstadoPrecio($id,$estado){
        $data = [
          'IdPrecioUnidadMedida' => $id,
          'IndicadorEstado' => $estado
        ];
        
        $resultado = $this->producto->modificarPrecioUnidadMedida($data);
        return $resultado;
      }

      public function editarProducto($id)
      {
        $resultado = $this->producto->mostrarProducto($id);
        return $resultado;
      }

      public function modificarProducto($post,$imagen)
      {
          $validacion = $this->validarproducto->validarCamposProducto($post);
          if ($validacion === 'error') {
            $validacion = "El Codigo o Nombre ingresado ya esta registrado. Intente con otro codigo";
            return  $validacion;
          } else {
            $resultado = $this->producto->actualizarProducto($post,$imagen);
            return $resultado;
          }
        
      }

      public function registrarResumenInventario($data)
      {
          $resultado = $this->producto->insertarResumenInventario($data);
          return $resultado;
      }

      public function eliminarResumenInventario($idResumenInventario)
      {
          $resultado = $this->producto->eliminarResumenInventario($idResumenInventario);
          return $resultado;
      }
}
