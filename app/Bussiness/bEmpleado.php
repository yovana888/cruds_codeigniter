<?php

namespace App\Bussiness;
use App\Models\mEmpleado;
use App\Validations\vEmpleado;


class bEmpleado
{
      public function __construct()
      {
          $this->empleado = new mEmpleado();
          $this->validarempleado = new vEmpleado();
      }

      public function obtenerEmpleados()
      {
          $resultado =  $this->empleado->obtenerEmpleados();
          return $resultado;
      }

      public function registrarPersonaEmpleado($data,$imagen)
      { 
          $validacion = $this->validarempleado->validarCamposEmpleado($data);
          if($validacion ==='error-persona'){
            $validacion = "La persona que intenta registrar ya Existe, pruebe buscar por su DNI o RUC";
            return $validacion; 

          }else{
            $resultado =  $this->empleado->insertarPersonaEmpleado($data,$imagen);
            return $resultado; 
          }
      }

      public function registrarEmpleado($data,$imagen)
      { 
          $validacion = $this->validarempleado->validarCamposEmpleado($data);
          if($validacion ==='error-persona'){
            $resultado = "La Persona ya se encuentra registrado como Empleado. Intente con otro.";
          }else{
            $resultado = $this->empleado->insertarEmpleado($data,$imagen);
          }
          return $resultado;  

      }

      public function editarEmpleado($id)
      {
        $resultado = $this->empleado->mostrarEmpleado($id);
        return $resultado;
      }

      public function modificarEmpleado($post,$imagen)
      {
          $validacion = $this->validarempleado->validarCamposEmpleado($post);
          if ($validacion === 'error-persona') {
            $validacion = "El numero de documento ya esta registrado para otra persona";
            return  $validacion;
          } else {
            $resultado = $this->empleado->actualizarEmpleado($post,$imagen);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $imagen='';
        $data = [
          'IdEmpleado' => $id,
          'EstadoEmpleado' => $estado
        ];
        $resultado = $this->empleado->actualizarEmpleado($data,$imagen);
        return $resultado;
      }

      public function buscarPersona($search){
        $resultado = $this->empleado->buscarPersona($search);
        return $resultado;
      }

      public function obtenerListadoRol()
      {
          $resultado =  $this->empleado->obtenerListadoRol();
          return $resultado;
      } 

      public function obtenerListadoEstadoCivil()
      {
          $resultado =  $this->empleado->obtenerListadoEstadoCivil();
          return $resultado;
      } 

      public function obtenerListadoTipoPersona()
      {
          $resultado =  $this->empleado->obtenerListadoTipoPersona();
          return $resultado;
      }
  
      public function obtenerListadoTipoDocumentoIdentidad()
      {
          $resultado =  $this->empleado->obtenerListadoTipoDocumentoIdentidad();
          return $resultado;
      } 

      public function obtenerListadoSede()
      {
          $resultado =  $this->empleado->obtenerListadoSede();
          return $resultado;
      } 

      
}