<?php

namespace App\Controllers;
use App\Bussiness\bProvincia;
use App\Reportes\rProvincia;

class Provincia extends BaseController
{
	public function __construct()
    {
	   $this->provincia = new bProvincia();
	   $this->reporte = new rProvincia();
	}
	
	public function index()
	{
        $data['departamentos'] = $this->provincia->obtenerDepartamentos()->getResult();
        echo view('provincia/index',$data);
    }
    
    public function obtenerProvincias()   
	{ 
		$resultado = $this->provincia->obtenerProvincias()->getResult();
		echo json_encode($resultado);
	}

	public function obtenerSiguienteCodigoUbigeo($id){
        $resultado = $this->provincia->obtenerSiguienteCodigoUbigeo($id);
		echo json_encode($resultado);
	}

	public function registrarProvincia()
	{   
		$data =$_POST;
		$resultado= $this->provincia->registrarProvincia($data);
		echo json_encode($resultado);
	}
	
	public function editarProvincia($id)
	{
		$data =$this->provincia->editarProvincia($id);
		echo json_encode($data);
	}
   
	public function modificarProvincia()
	{
		$post = $_POST;
		$resultado= $this->provincia->modificarProvincia($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado)
	{
        $consulta = $this->provincia->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
