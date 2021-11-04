<?php

namespace App\Bussiness;

use App\Models\mTipoPersona;
use App\Validations\vTipoPersona;


class bTipoPersona
{
      public function __construct()
      {
          $this->tipopersona = new mTipoPersona();
          $this->validartipopersona = new vTipoPersona();
      }

      public function obtenerTiposPersona()
      {
          $resultado =  $this->tipopersona->obtenerTiposPersona();
          return $resultado;
      }

      public function registrarTipoPersona($data)
      { 
          $validacion = $this->validartipopersona->validarCamposTipoPersona($data);
          if($validacion ==='error'){
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->tipopersona->insertarTipoPersona($data);
            return $resultado; 
          }
      }

      public function editarTipoPersona($id)
      {
        $resultado = $this->tipopersona->mostrarTipoPersona($id);
        return $resultado;
      }

      public function modificarTipoPersona($post)
      {
          $validacion = $this->validartipopersona->validarCamposTipoPersona($post);
          if ($validacion === 'error') {
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->tipopersona->actualizarTipoPersona($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdTipoPersona' => $id,
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->tipopersona->actualizarTipoPersona($data);
        return $resultado;
      }

      
}
