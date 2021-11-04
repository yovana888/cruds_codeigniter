<?php

namespace App\Bussiness;

use App\Models\mGiroNegocio;
use App\Validations\vGiroNegocio;


class bGiroNegocio
{
      public function __construct()
      {
          $this->gironegocio = new mGiroNegocio();
          $this->validargironegocio = new vGiroNegocio();
      }

      public function obtenerGirosNegocio()
      {
          $resultado =  $this->gironegocio->obtenerGirosNegocio();
          return $resultado;
      }

      public function registrarGiroNegocio($data)
      { 
          $validacion = $this->validargironegocio->validarCamposGiroNegocio($data);
          if($validacion ==='error'){
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->gironegocio->insertarGiroNegocio($data);
            return $resultado; 
          }
      }

      public function editarGiroNegocio($id)
      {
        $resultado = $this->gironegocio->mostrarGiroNegocio($id);
        return $resultado;
      }

      public function modificarGiroNegocio($post)
      {
          $validacion = $this->validargironegocio->validarCamposGiroNegocio($post);
          if ($validacion === 'error') {
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->gironegocio->actualizarGiroNegocio($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdGiroNegocio' => $id,
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->gironegocio->actualizarGiroNegocio($data);
        return $resultado;
      }

      
}
