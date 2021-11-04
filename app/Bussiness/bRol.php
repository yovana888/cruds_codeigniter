<?php

namespace App\Bussiness;

use App\Models\mRol;
use App\Validations\vRol;


class bRol
{
      public function __construct()
      {
          $this->rol = new mRol();
          $this->validarrol = new vRol();
      }

      public function obtenerRoles()
      {
          $resultado =  $this->rol->obtenerRoles();
          return $resultado;
      }

      public function registrarRol($data)
      { 
          $validacion = $this->validarrol->validarCamposRol($data);
          if($validacion ==='error'){
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->rol->insertarRol($data);
            return $resultado; 
          }
      }

      public function editarRol($id)
      {
        $resultado = $this->rol->mostrarRol($id);
        return $resultado;
      }

      public function modificarRol($post)
      { 
          $validacion = $this->validarrol->validarCamposRol($post);
          if ($validacion === 'error') {
            $validacion = "El nombre ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->rol->actualizarRol($post);
            return $resultado;
          }
      }

      public function modificarIndicadorEstado($id,$estado){

        $data = [
          'IdRol' => $id,
          'IndicadorEstado' => $estado
        ];
        $resultado = $this->rol->actualizarRol($data);
        return $resultado;
      }

      
}
