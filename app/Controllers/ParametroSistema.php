<?php
namespace App\Controllers;
use App\Bussiness\bParametroSistema;


date_default_timezone_set('America/Lima');

class ParametroSistema extends BaseController
{
	public function __construct()
    {
		$this->parametrosistema = new bParametroSistema();
	}

	public function index()
	{
        $data['grupoparametro'] = $this->parametrosistema->obtenerGrupoParametro()->getResult();
		echo view('parametrosistema/index',$data);
    }

    public function obtenerParametroSistema()
	{
		$resultado = $this->parametrosistema->obtenerParametroSistema()->getResult();
		echo json_encode($resultado);
    }

    public function obtenerGrupoParametro()
	{
		$resultado = $this->parametrosistema->obtenerGrupoParametro();
		echo json_encode($resultado);
    }

    public function editarParametroSistema($id)
    {
        $resultado = $this->parametrosistema->editarParametroSistema($id);
        return $resultado;
    }

    public function registrarParametroSistema()
    {
        $data = $_POST;
        $consulta = $this->parametrosistema->registrarParametroSistema($data);
        echo json_encode($consulta);    
    }

    public function modificarParametroSistema()
    {
        $data = $_POST;
        $consulta = $this->parametrosistema->modificarParametroSistema($data);
        echo json_encode($consulta);    

    }

    public function modificarIndicadorEstado()
	{
        $data = $_GET;
        $id = $data['id'];
        $estado = $data['estado'];
        $consulta = $this->parametrosistema->modificarIndicadorEstado($id,$estado);
        print_r($consulta);
    }

}