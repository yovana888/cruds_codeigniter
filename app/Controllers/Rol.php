<?php
namespace App\Controllers;
use App\Bussiness\bRol;
use App\Reportes\rRol;

class Rol extends BaseController
{
	public function __construct()
    {
	   $this->rol = new bRol();
	   $this->reporte = new rRol();
	}
	
	public function index()
	{
        echo view('rol/index');
    }
    
    public function obtenerRoles()   
	{ 
		$resultado = $this->rol->obtenerRoles()->getResult();
		echo json_encode($resultado);
	}

	public function registrarRol()
	{   
		$data =$_POST;
		$resultado= $this->rol->registrarRol($data);
		echo json_encode($resultado);
	}
	
	public function editarRol($id){
		$data =$this->rol->editarRol($id);
		echo json_encode($data);
	}
   
    public function modificarRol(){
		$post = $_POST;
		$resultado= $this->rol->modificarRol($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->rol->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}


}
