<?php

namespace App\Bussiness;
use App\Models\mSede;
use App\Validations\vSede;


class bSede
{
      public function __construct()
      {
          $this->sede = new mSede();
          $this->validarsede = new vSede();
      }

      public function obtenerSedes()
      {
          $resultado =  $this->sede->obtenerSedes();
          return $resultado;
      }

      public function obtenerSedeEmpresa($id)  {
          $resultado =  $this->sede->obtenerSedeEmpresa($id);
          return $resultado;
      }

      public function registrarSede($data)
      { 
          $validacion = $this->validarsede->validarCamposSede($data);
          if($validacion ==='error'){
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return $validacion; 
          }else{
            $resultado =  $this->sede->insertarSede($data);
            return $resultado; 
          }
      }

      public function editarSede($id)
      {
        $resultado = $this->sede->mostrarSede($id);
        return $resultado;
      }

      public function modificarSede($post)
      {
          $validacion = $this->validarsede->validarCamposSede($post);
          if ($validacion === 'error') {
            $validacion = "El nombre o el codigo ingresado ya esta registrado. Intente con otro";
            return  $validacion;
          } else {
            $resultado = $this->sede->actualizarSede($post);
            return $resultado;
          }
        
      }

      public function modificarIndicadorEstado($id,$estado){
        $data = [
          'IdSede' => $id,
          'EstadoSede' => $estado
        ];
        $resultado = $this->sede->actualizarSede($data);
        return $resultado;
      }

      
}
