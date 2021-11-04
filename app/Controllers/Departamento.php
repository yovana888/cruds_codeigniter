<?php
namespace App\Controllers;
use App\Bussiness\bDepartamento;
use App\Reportes\rDepartamento;
class Departamento extends BaseController
{
	public function __construct()
    {
        $this->departamento = new bDepartamento();
        $this->reporte = new rDepartamento();
	}

	public function index()
	{
		echo view('departamento/index');
    }

    public function obtenerDepartamento()
	{
		$resultado = $this->departamento->obtenerDepartamento();
		echo json_encode($resultado);
    }

    public function editarDepartamento($id)
    {
        $resultado = $this->departamento->editarDepartamento($id);
        return $resultado;
    }

    public function registrarDepartamento()
    {
        $data = $_POST;
        $consulta = $this->departamento->registrarDepartamento($data);
        echo json_encode($consulta);
    }

    public function modificarDepartamento()
    {
        $data = $_POST;
        $consulta = $this->departamento->modificarDepartamento($data);
        echo json_encode($consulta);

    }

    public function modificarIndicadorEstado($id,$estado)
	{
        $consulta = $this->departamento->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
    }

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}