<?php

namespace App\Bussiness;

use App\Models\mParametroSistema;
use App\Validations\vCampoUnique;

class bParametroSistema {

    public function __construct()
    {

        $this->parametrosistema = new mParametroSistema();
        $this->validarparametrosistema = new vCampoUnique();

    }

    public function obtenerParametroSistema()
    {
        $resultado = $this->parametrosistema->mostrarListadoParametroSistema();
        return $resultado;

    }

    public function obtenerGrupoParametro()
    {
        $resultado = $this->parametrosistema->obtenerGrupoParametro();
        return $resultado;
    }
    /* */
    public function editarParametroSistema($id)
    {

        $resultado = $this->parametrosistema->mostrarParametroSistema($id);
        return json_encode(array('data' => $resultado));

    }


    public function registrarParametroSistema($data)
    {
        /*
        $validacion = $this->validargrupoparametro->validarCamposGrupoParametro($data);

        if($validacion==='error'){
            $validacion = "El nombre o atajo del modulo debe ser unico. Intente nuevamente.";
            return $validacion;
        }else{
            $resultado =  $this->parametrosistema->insertarParametroSistema($data);
            return $resultado;
        }
        */
        $resultado =  $this->parametrosistema->insertarParametroSistema($data);
        return $resultado; 

    }

    public function modificarParametroSistema($data)
    {
        /*$validacion = $this->validargrupoparametro->validarCamposGrupoParametro($data);

        if($validacion==='error'){
            $validacion = "El nombre o atajo del modulo debe ser unico. Intente nuevamente.";
            return $validacion;
        }else{

            $resultado =  $this->grupoparametro->actualizarGrupoParametro($data);
            return $resultado;
        }
        */
        $resultado =  $this->parametrosistema->actualizarParametroSistema($data);
        return $resultado;

    }

    public function modificarIndicadorEstado($id,$estado)
    {
        if($estado=='A'){
            $estado='I';
        }else{
            $estado='A';
        }

        $data = [
            'IdParametroSistema' => $id,
            'IndicadorEstado' => $estado
        ];

        $resultado = $this->parametrosistema->actualizarParametroSistema($data);

    }


}