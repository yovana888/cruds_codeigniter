<?php
namespace App\Controllers;
use App\Bussiness\bDistrito;
use App\Reportes\rDistrito;

class Distrito extends BaseController
{
	public function __construct()
    {
	   $this->distrito = new bDistrito();
	   $this->reporte = new rDistrito();
	}

	public function index()
	{
        $data['departamentos'] = $this->distrito->obtenerDepartamentos()->getResult();
        echo view('distrito/index',$data);
    }

    public function obtenerDistritos()
	{
		$resultado = $this->distrito->obtenerDistritos()->getResult();
		echo json_encode($resultado);
	}

	public function obtenerProvincias($id)
	{
		$resultado = $this->distrito->obtenerProvincias($id)->getResult();
		echo json_encode($resultado);
	}

	public function obtenerSiguienteCodigoUbigeo($id){
        $resultado = $this->distrito->obtenerSiguienteCodigoUbigeo($id);
		echo json_encode($resultado);
	}

	public function obtenerDistrito()
	{
		$resultado = $this->distrito->obtenerDistrito();
		echo json_encode($resultado);
    }

    public function registrarDistrito()
	{
		$data =$_POST;
		$resultado= $this->distrito->registrarDistrito($data);
		echo json_encode($resultado);
	}

	public function editarDistrito($id){
		$data =$this->distrito->editarDistrito($id)->getResult();
		echo json_encode($data);
	}

	public function modificarDistrito(){
		$post = $_POST;
		$resultado= $this->distrito->modificarDistrito($post);
		echo json_encode($resultado);
	}

    public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->distrito->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

	public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
