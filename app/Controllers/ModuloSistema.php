<?php
namespace App\Controllers;
use App\Bussiness\bModuloSistema;

class ModuloSistema extends BaseController
{
	public function __construct()
    {
		$this->modulosistema = new bModuloSistema();
	}

	public function index()
	{
		echo view('modulosistema/index');
    }

    public function obtenerModuloSistema()
	{
		$resultado = $this->modulosistema->obtenerModuloSistema();
		echo json_encode($resultado);
    }

    public function editarModuloSistema($id)
    {
        $resultado = $this->modulosistema->editarModuloSistema($id);
        return $resultado;
    }

    public function registrarModuloSistema()
    {
        $data = $_POST;
        $consulta = $this->modulosistema->registrarModuloSistema($data);
        echo json_encode($consulta);    
    }

    public function modificarModuloSistema()
    {
        $data = $_POST;
        $consulta = $this->modulosistema->modificarModuloSistema($data);
        echo json_encode($consulta);    

    }

    public function modificarIndicadorEstado($id,$estado)
	{
        $consulta = $this->modulosistema->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
         
    }

    public function generarReporte($tipo)
    {
        $this->reporte->generarReporte($tipo);
    }

}