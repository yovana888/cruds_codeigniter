<?php

namespace App\Bussiness;

use App\Models\mModuloSistema;
use App\Validations\vModuloSistema;

class bModuloSistema {

    public function __construct()
    {

        $this->modulosistema = new mModuloSistema();
        $this->vmodulosistema = new vModuloSistema();

    }

    public function obtenerModuloSistema()
    {
        $resultado = $this->modulosistema->mostrarListadoModuloSistema();
        return $resultado;

    }

    public function editarModuloSistema($id)
    {

        $resultado = $this->modulosistema->mostrarModuloSistema($id);
        return json_encode(array('data' => $resultado));

    }


    public function registrarModuloSistema($data)
    {

        $validacion = $this->vmodulosistema->validarDuplicado($data);

        if($validacion!=true){
            $validacion = "El nombre o atajo del modulo debe ser unico. Intente nuevamente.";
            return $validacion;
        }else{
            $resultado =  $this->modulosistema->insertarModuloSistema($data);
            return $resultado;
        } 

    }

    public function modificarModuloSistema($data)
    {
        $validacion = $this->vmodulosistema->validarDuplicado($data);

        if($validacion!=true){
            $validacion = "El nombre o atajo del modulo debe ser unico. Intente nuevamente.";
            return $validacion;
        }else{

            $resultado =  $this->modulosistema->actualizarModuloSistema($data);
            return $resultado;
        }

    }

    public function modificarIndicadorEstado($id,$estado)
    {
        $data = [
            'IdModuloSistema' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->modulosistema->actualizarModuloSistema($data);
        return $resultado; 
         
    }


}