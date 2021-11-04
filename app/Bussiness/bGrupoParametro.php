<?php
namespace App\Bussiness;
use App\Models\mGrupoParametro;
use App\Validations\vGrupoParametro;

class bGrupoParametro {

    public function __construct()
    {

        $this->grupoparametro = new mGrupoParametro();
        $this->vgrupoparametro = new vGrupoParametro();

    }

    public function obtenerGrupoParametro()
    {
        $resultado = $this->grupoparametro->mostrarListadoGrupoParametro();
        return $resultado;

    }

    public function editarGrupoParametro($id)
    {

        $resultado = $this->grupoparametro->mostrarGrupoParametro($id);
        return json_encode(array('data' => $resultado));

    }


    public function registrarGrupoParametro($data)
    {

        $validacion = $this->vgrupoparametro->validarDuplicado($data);

        if($validacion!=true){
            $validacion = "El nombre de grupo de parametro debe ser unico. Intente nuevamente.";            
        }else{
            $resultado =  $this->grupoparametro->insertarGrupoParametro($data);            
        } 
        return $validacion;
    }

    public function modificarGrupoParametro($data)
    {
        $validacion = $this->vgrupoparametro->validarDuplicado($data);

        if($validacion!=true){
            $validacion = "El nombre de grupo de parametro  debe ser unico. Intente nuevamente.";
             
        }else{

            $resultado =  $this->grupoparametro->actualizarGrupoParametro($data);
            
        }
        return $validacion;

    }

    public function modificarIndicadorEstado($id,$estado)
    {
        $data = [
            'IdGrupoParametro' => $id,
            'IndicadorEstado' => $estado
        ];
        $resultado = $this->grupoparametro->actualizarGrupoParametro($data);
        return $resultado;       

    }


}