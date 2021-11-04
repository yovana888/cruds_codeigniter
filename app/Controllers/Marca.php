<?php
namespace App\Controllers;
use App\Bussiness\bMarca;
use App\Reportes\rMarca;

class Marca extends BaseController
{
	public function __construct()
    {
	   $this->marca = new bMarca();
	   $this->reporte = new rMarca();
	}
	
	public function index()
	{
        echo view('marca/index');
    }
    
    public function obtenerMarcas()   
	{ 
		$resultado = $this->marca->obtenerMarcas()->getResult();
		echo json_encode($resultado);
	}


	public function registrarMarca()
	{   
		$data =$_POST;
		$resultado= $this->marca->registrarMarca($data);
		echo json_encode($resultado);
	}
	
	public function editarMarca($id){
		$data =$this->marca->editarMarca($id);
		echo json_encode($data);
	}
   
    public function modificarMarca(){
		$post = $_POST;
		$resultado= $this->marca->modificarMarca($post);
		echo json_encode($resultado);
	}

	public function modificarIndicadorEstado($id,$estado){
        $consulta = $this->marca->modificarIndicadorEstado($id,$estado);
        echo json_encode($consulta);
	}

    public function generarReporte($tipo)
	{
		$this->reporte->generarReporte($tipo);
	}

}
