<?php

namespace App\Bussiness;

use App\Models\mDepartamento;
use App\Validations\vCampoUnique;

class bDepartamento {

    public function __construct()
    {

        $this->departamento = new mDepartamento();
        $this->validardepartamento = new vCampoUnique();

    }

    public function obtenerDepartamento()
    {
        $resultado = $this->departamento->mostrarListadoDepartamento();
        return $resultado;

    }

    public function editarDepartamento($id)
    {

        $resultado = $this->departamento->mostrarDepartamento($id);
        return json_encode(array('data' => $resultado));

    }


    public function registrarDepartamento($data)
    {

        $validacion = $this->validardepartamento->validarCamposDepartamento($data);

        if($validacion==='error'){
            $validacion = "El codigo de ubigeo debe ser unico. Intente con otro codigo";
            return $validacion;
        }else{
            $resultado =  $this->departamento->insertarDepartamento($data);
            return $resultado;
        }

    }

    public function modificarDepartamento($data)
    {
        $validacion = $this->validardepartamento->validarCamposDepartamento($data);

        if($validacion==='error'){
            $validacion = "El codigo   ubigeo o nombre debe ser unico. Intente con otros datos";
            return $validacion;
        }else{

            $resultado =  $this->departamento->actualizarDepartamento($data);
            return $resultado;
        }

    }

    public function modificarIndicadorEstado($id,$estado)
    {
        $data = [
            'IdDepartamento' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->departamento->actualizarDepartamento($data);
        return $resultado;
    }


}