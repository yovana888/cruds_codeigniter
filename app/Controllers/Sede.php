<?php
namespace App\Controllers;
use App\Bussiness\bSede;
use App\Reportes\rSede;

class Sede extends BaseController
{
	public function __construct()
    {
	   $this->sede = new bSede();
	   $this->reporte = new rSede();
	}
	
	public function index()
	{
        echo view('sede/index');
    }
    
    public function obtenerSedes()   
	{ 
		$resultado = $this->sede->obtenerSedes()->getResult();
		echo json_encode($resultado);
	}

	public function obtenerSedeEmpresa($id)   
	{ 
		$resultado = $this->sede->obtenerSedeEmpresa($id)->getResult();
		echo json_encode($resultado);
	}

	public function registrarSede()
	{   
		$data =$_POST;
		$resultado= $this->sede->registrarSede($data);
		echo json_encode($resultado);
	}
	
	public function editarSede($id){
		$data =$this->sede->editarSede($id);
		echo json_encode($data);
	}
   
    public function modificarSede(){
		$post = $_POST;
		$resultado= $this->sede->modificarSede($post);
		echo json_encode($resultado);
	}
	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->sede->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
