<?php

namespace App\Bussiness;

use App\Models\mTransportista;
use App\Validations\vTransportista;


class bTransportista
{
      public function __construct()
      {
          $this->transportista = new mTransportista();
          $this->validartransportista = new vTransportista();
      }

      public function obtenerTransportistas()
      {
          $resultado =  $this->transportista->obtenerTransportistas();
          return $resultado;
      }

      public function registrarPersonaTransportista($data,$imagen)
      { 
          $validacion = $this->validartransportista->validarCamposTransportista($data);
          if($validacion ==='error-persona'){
            $validacion = "La persona que intenta registrar ya Existe, pruebe buscar por su DNI o RUC";
            return $validacion; 

          }else if($validacion ==='error-transportista'){
            $validacion = "La Licencia de Conducir que intenta registrar ya existe";
            return $validacion; 
            
          }else{
            $resultado =  $this->transportista->insertarPersonaTransportista($data,$imagen);
            return $resultado; 
          }
      }

      public function registrarTransportista($data,$imagen)
      { 
          $validacion = $this->validartransportista->validarCamposTransportista($data);
          if($validacion ==='error-persona'){
            $resultado = "La Persona ya se encuentra registrado como transportista. Intente con otro.";
          }else if($validacion ==='error-licencia'){           
            $resultado = "El Numero de Licencia ingresado ya esta en uso. Intente con otro.";
          }else{
            $resultado = $this->transportista->insertarTransportista($data,$imagen);
          }
          return $resultado;  

      }

      public function editarTransportista($id)
      {
        $resultado = $this->transportista->mostrarTransportista($id);
        return $resultado;
      }

      public function modificarTransportista($post,$imagen)
      {
          $validacion = $this->validartransportista->validarCamposTransportista($post);
          if ($validacion === 'error') {
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->transportista->actualizarTransportista($post,$imagen);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $imagen='';
        $data = [
          'IdTransportista' => $id,
          'EstadoTransportista' => $estado
        ];
        $resultado = $this->transportista->actualizarTransportista($data,$imagen);
        return $resultado;
      }

      public function buscarPersona($search){
        $resultado = $this->transportista->buscarPersona($search);
        return $resultado;
      }

      public function obtenerListadoRol()
      {
          $resultado =  $this->transportista->obtenerListadoRol();
          return $resultado;
      } 

      public function obtenerListadoEstadoCivil()
      {
          $resultado =  $this->transportista->obtenerListadoEstadoCivil();
          return $resultado;
      } 

      public function obtenerListadoTipoPersona()
      {
          $resultado =  $this->transportista->obtenerListadoTipoPersona();
          return $resultado;
      }
  
      public function obtenerListadoTipoDocumentoIdentidad()
      {
          $resultado =  $this->transportista->obtenerListadoTipoDocumentoIdentidad();
          return $resultado;
      } 

      
}