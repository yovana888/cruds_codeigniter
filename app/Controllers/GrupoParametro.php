<?php
namespace App\Controllers;
use App\Bussiness\bGrupoParametro;


date_default_timezone_set('America/Lima');

class GrupoParametro extends BaseController
{
	public function __construct()
    {
		$this->grupoparametro = new bGrupoParametro();
	}

	public function index()
	{
		echo view('grupoparametro/index');
    }

    public function obtenerGrupoParametro()
	{
		$resultado = $this->grupoparametro->obtenerGrupoParametro();
		echo json_encode($resultado);
    }

    public function editarGrupoParametro($id)
    {
        $resultado = $this->grupoparametro->editarGrupoParametro($id);
        return $resultado;
    }

    public function registrarGrupoParametro()
    {
        $data = $_POST;
        $consulta = $this->grupoparametro->registrarGrupoParametro($data);
        echo json_encode($consulta);    
    }

    public function modificarGrupoParametro()
    {
        $data = $_POST;
        $consulta = $this->grupoparametro->modificarGrupoParametro($data);
        echo json_encode($consulta);    

    }

    public function modificarIndicadorEstado($id,$estado)
    {        
         
        $consulta = $this->grupoparametro->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }     

}