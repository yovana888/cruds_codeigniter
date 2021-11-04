<?php

namespace App\Bussiness;

use App\Models\mTipoExistencia;
use App\Validations\vTipoExistencia;


class bTipoExistencia
{
      public function __construct()
      {
            $this->tipoexistencia = new mTipoExistencia();
            $this->validartipoexistencia = new vTipoExistencia();
      }

      public function obtenerTiposExistencia()
      {
            $resultado =  $this->tipoexistencia->obtenerTiposExistencia();
            return $resultado;
      }

      public function registrarTipoExistencia($data)
      { 
            $validacion = $this->validartipoexistencia->validarCamposTipoExistencia($data);
            if($validacion ==='error'){
                $validacion = "El nombre ingresado o el codigo ya esta registrado. Intente con otro";
                return $validacion; 
            }else{
                $resultado =  $this->tipoexistencia->insertarTipoExistencia($data);
                return $resultado; 
            }
      }

      public function editarTipoExistencia($id)
      {
            $resultado = $this->tipoexistencia->mostrarTipoExistencia($id);
            return $resultado;
      }

      public function modificarTipoExistencia($data)
      {
            $validacion = $this->validartipoexistencia->validarCamposTipoExistencia($data);
            if ($validacion === 'error') {
                $validacion = "El nombre ingresado o el codigo ya esta registrado. Intente con otro";
                return  $validacion;
            } else {
                $resultado = $this->tipoexistencia->actualizarTipoExistencia($data);
                return $resultado;
            }
        
      }

      public function modificarIndicadorEstado($id,$estado){
            
            $data = [
            'IdTipoExistencia' => $id,
            'IndicadorEstado' => $estado
            ];
            $resultado = $this->tipoexistencia->actualizarTipoExistencia($data);
            return $resultado;
      }

      
}
