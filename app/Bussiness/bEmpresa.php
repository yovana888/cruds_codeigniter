<?php

namespace App\Bussiness;

use App\Models\mEmpresa;
use App\Validations\vEmpresa;


class bEmpresa
{
      public function __construct()
      {
          $this->empresa = new mEmpresa();
          $this->validarempresa = new vEmpresa();
      }

      public function obtenerEmpresa()
      {
          $resultado =  $this->empresa->obtenerEmpresa();
          return $resultado;
      }

      public function registrarEmpresa($data,$logo)
      { 
          $validacion = $this->validarempresa->validarCamposEmpresa($data);
          if($validacion ==='error'){
            $validacion = "La Razon Social o el Codigo(RUC) ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->empresa->insertarEmpresa($data,$logo);
            return $resultado; 
          }
      }

      public function editarEmpresa($id)
      {
        $resultado = $this->empresa->mostrarEmpresa($id);
        return $resultado;
      }

      public function modificarEmpresa($post,$logo)
      {
          $validacion = $this->validarempresa->validarCamposEmpresa($post);
          if ($validacion === 'error') {
            $validacion = "La Razon Social o el Codigo(RUC) ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->empresa->actualizarEmpresa($post,$logo);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdEmpresa' => $id,
          'EstadoEmpresa' => $estado
        ];
        $resultado = $this->Empresa->actualizarEmpresa($data);
        return $resultado;
      }

      
}
